<?php

namespace Botble\News\Providers;

use Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\News\Models\Category;
use Botble\News\Models\Tag;
use Botble\News\Repositories\Interfaces\PostInterface;
use Botble\News\Services\NewsService;
use Botble\Dashboard\Supports\DashboardWidgetInstance;
use Botble\Page\Models\Page;
use Botble\Page\Repositories\Interfaces\PageInterface;
use Eloquent;
use Event;
use Html;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Menu;
use stdClass;
use Theme;
use Throwable;

class HookServiceProvider extends ServiceProvider
{
    /**
     * @throws Throwable
     */
    public function boot()
    {
        if (defined('MENU_ACTION_SIDEBAR_OPTIONS')) {
            Menu::addMenuOptionModel(Category::class);
            Menu::addMenuOptionModel(Tag::class);
            add_action(MENU_ACTION_SIDEBAR_OPTIONS, [$this, 'registerMenuOptions'], 2);
        }
        add_filter(DASHBOARD_FILTER_ADMIN_LIST, [$this, 'registerDashboardWidgets'], 21, 2);
        add_filter(BASE_FILTER_PUBLIC_SINGLE_DATA, [$this, 'handleSingleView'], 2);
        if (defined('PAGE_MODULE_SCREEN_NAME')) {
            add_filter(PAGE_FILTER_FRONT_PAGE_CONTENT, [$this, 'renderNewsPage'], 2, 2);
            add_filter(PAGE_FILTER_PAGE_NAME_IN_ADMIN_LIST, [$this, 'addAdditionNameToPageName'], 147, 2);
        }

        if (function_exists('admin_bar')) {
            Event::listen(RouteMatched::class, function () {
                admin_bar()->registerLink(trans('plugins/news::posts.post'), route('posts.create'), 'add-new');
            });
        }

        if (function_exists('add_shortcode')) {
            add_shortcode('news-posts', trans('plugins/news::base.short_code_name'), trans('plugins/news::base.short_code_description'), [$this, 'renderNewsPosts']);
            shortcode()->setAdminConfig('news-posts',
                view('plugins/news::partials.posts-short-code-admin-config')->render());
        }

        if (function_exists('theme_option')) {
            add_action(RENDERING_THEME_OPTIONS_PAGE, [$this, 'addThemeOptions'], 35);
        }
    }

    public function addThemeOptions()
    {
        $pages = $this->app->make(PageInterface::class)
            ->pluck('pages.name', 'pages.id', ['status' => BaseStatusEnum::PUBLISHED]);

        theme_option()
            ->setSection([
                'title'      => 'News',
                'desc'       => 'Theme options for News',
                'id'         => 'opt-text-subsection-news',
                'subsection' => true,
                'icon'       => 'fa fa-edit',
                'fields'     => [
                    [
                        'id'         => 'news_page_id',
                        'type'       => 'select',
                        'label'      => trans('plugins/news::base.news_page_id'),
                        'attributes' => [
                            'name'    => 'news_page_id',
                            'list'    => ['' => trans('plugins/news::base.select')] + $pages,
                            'value'   => '',
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'id'         => 'number_of_posts_in_a_category',
                        'type'       => 'number',
                        'label'      => trans('plugins/news::base.number_posts_per_page_in_category'),
                        'attributes' => [
                            'name'    => 'number_of_posts_in_a_category',
                            'value'   => 12,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                    [
                        'id'         => 'number_of_posts_in_a_tag',
                        'type'       => 'number',
                        'label'      => trans('plugins/news::base.number_posts_per_page_in_tag'),
                        'attributes' => [
                            'name'    => 'number_of_posts_in_a_tag',
                            'value'   => 12,
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * Register sidebar options in menu
     * @throws Throwable
     */
    public function registerMenuOptions()
    {
        if (Auth::user()->hasPermission('categories.index')) {
            Menu::registerMenuOptions(Category::class, trans('plugins/news::categories.menu'));
        }

        if (Auth::user()->hasPermission('tags.index')) {
            Menu::registerMenuOptions(Tag::class, trans('plugins/news::tags.menu'));
        }
    }

    /**
     * @param array $widgets
     * @param Collection $widgetSettings
     * @return array
     * @throws Throwable
     */
    public function registerDashboardWidgets($widgets, $widgetSettings)
    {
        if (!Auth::user()->hasPermission('posts.index')) {
            return $widgets;
        }

        Assets::addScriptsDirectly(['/vendor/core/plugins/news/js/news.js']);

        return (new DashboardWidgetInstance)
            ->setPermission('posts.index')
            ->setKey('widget_posts_recent')
            ->setTitle(trans('plugins/news::posts.widget_posts_recent'))
            ->setIcon('fas fa-edit')
            ->setColor('#f3c200')
            ->setRoute(route('posts.widget.recent-posts'))
            ->setBodyClass('scroll-table')
            ->setColumn('col-md-6 col-sm-6')
            ->init($widgets, $widgetSettings);
    }

    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     * @throws BindingResolutionException
     */
    public function handleSingleView($slug)
    {
        return (new NewsService)->handleFrontRoutes($slug);
    }

    /**
     * @param stdClass $shortcode
     * @return array|string
     * @throws Throwable
     */
    public function renderNewsPosts($shortcode)
    {
        $posts = $this->app->make(PostInterface::class)->getAllPosts($shortcode->paginate, true, ['slugable', 'categories', 'categories.slugable']);

        $view = 'plugins/news::themes.templates.posts';
        $themeView = Theme::getThemeNamespace() . '::views.templates.posts';
        if (view()->exists($themeView)) {
            $view = $themeView;
        }

        return view($view, compact('posts'))->render();
    }

    /**
     * @param string|null $content
     * @param Page $page
     * @return array|string|null
     * @throws Throwable
     */
    public function renderNewsPage(?string $content, Page $page)
    {
        if ($page->id == theme_option('news_page_id', setting('news_page_id'))) {
            $view = 'plugins/news::themes.loop';

            if (view()->exists(Theme::getThemeNamespace() . '::views.loop')) {
                $view = Theme::getThemeNamespace() . '::views.loop';
            }
            return view($view, ['posts' => get_all_posts()])->render();
        }

        return $content;
    }

    /**
     * @param string|null $name
     * @param Page $page
     * @return string|null
     */
    public function addAdditionNameToPageName(?string $name, Page $page)
    {
        if ($page->id == theme_option('news_page_id', setting('news_page_id'))) {
            $subTitle = Html::tag('span', trans('plugins/news::base.news_page'), ['class' => 'additional-page-name'])
                ->toHtml();
            if (Str::contains($name, ' —')) {
                return $name . ', ' . $subTitle;
            }

            return $name . ' —' . $subTitle;
        }

        return $name;
    }
}
