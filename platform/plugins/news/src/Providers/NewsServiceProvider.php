<?php

namespace Botble\News\Providers;

use Botble\Shortcode\View\View;
use Illuminate\Routing\Events\RouteMatched;
use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\News\Models\Post;
use Botble\News\Repositories\Caches\PostCacheDecorator;
use Botble\News\Repositories\Eloquent\PostRepository;
use Botble\News\Repositories\Interfaces\PostInterface;
use Event;
use Illuminate\Support\ServiceProvider;
use Botble\News\Models\Category;
use Botble\News\Repositories\Caches\CategoryCacheDecorator;
use Botble\News\Repositories\Eloquent\CategoryRepository;
use Botble\News\Repositories\Interfaces\CategoryInterface;
use Botble\News\Models\Tag;
use Botble\News\Repositories\Caches\TagCacheDecorator;
use Botble\News\Repositories\Eloquent\TagRepository;
use Botble\News\Repositories\Interfaces\TagInterface;
use Language;
use Note;
use SeoHelper;
use SlugHelper;

/**
 * @since 02/07/2016 09:50 AM
 */
class NewsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(PostInterface::class, function () {
            return new PostCacheDecorator(new PostRepository(new Post));
        });

        $this->app->bind(CategoryInterface::class, function () {
            return new CategoryCacheDecorator(new CategoryRepository(new Category));
        });

        $this->app->bind(TagInterface::class, function () {
            return new TagCacheDecorator(new TagRepository(new Tag));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        SlugHelper::registerModule(Post::class, 'News Posts');
        SlugHelper::registerModule(Category::class, 'News Categories');
        SlugHelper::registerModule(Tag::class, 'News Tags');

        SlugHelper::setPrefix(Tag::class, 'tag');

        $this->setNamespace('plugins/news')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web', 'api'])
            ->loadMigrations()
            ->publishAssets();

        $this->app->register(EventServiceProvider::class);

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()
                ->registerItem([
                    'id'          => 'cms-plugins-news',
                    'priority'    => 3,
                    'parent_id'   => null,
                    'name'        => 'plugins/news::base.menu_name',
                    'icon'        => 'fa fa-edit',
                    'url'         => route('posts.index'),
                    'permissions' => ['posts.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-news-post',
                    'priority'    => 1,
                    'parent_id'   => 'cms-plugins-news',
                    'name'        => 'plugins/news::posts.menu_name',
                    'icon'        => null,
                    'url'         => route('posts.index'),
                    'permissions' => ['posts.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-news-categories',
                    'priority'    => 2,
                    'parent_id'   => 'cms-plugins-news',
                    'name'        => 'plugins/news::categories.menu_name',
                    'icon'        => null,
                    'url'         => route('categories.index'),
                    'permissions' => ['categories.index'],
                ])
                ->registerItem([
                    'id'          => 'cms-plugins-news-tags',
                    'priority'    => 3,
                    'parent_id'   => 'cms-plugins-news',
                    'name'        => 'plugins/news::tags.menu_name',
                    'icon'        => null,
                    'url'         => route('tags.index'),
                    'permissions' => ['tags.index'],
                ]);
        });

        $this->app->booted(function () {
            $models = [Post::class, Category::class, Tag::class];

            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                Language::registerModule($models);
            }

            SeoHelper::registerModule($models);

            $configKey = 'packages.revision.general.supported';
            config()->set($configKey, array_merge(config($configKey, []), [Post::class]));

            if (defined('NOTE_FILTER_MODEL_USING_NOTE')) {
                Note::registerModule(Post::class);
            }

            $this->app->register(HookServiceProvider::class);
        });

        if (function_exists('shortcode')) {
            view()->composer([
                'plugins/news::themes.post',
                'plugins/news::themes.category',
                'plugins/news::themes.tag',
            ], function (View $view) {
                $view->withShortcodes();
            });
        }
    }
}
