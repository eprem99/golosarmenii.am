<?php

namespace Botble\Comments\Providers;

use Html;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Theme;

class HookServiceProvider extends ServiceProvider
{
    /**
     * @var Collection
     */
    protected $unreadCommentss = [];

    /**
     * @throws \Throwable
     */
    public function boot()
    {
        $this->app->booted(function () {
           // add_filter(BASE_FILTER_TOP_HEADER_LAYOUT, [$this, 'registerTopHeaderNotification'], 120);
            add_filter(BASE_FILTER_APPEND_MENU_NAME, [$this, 'getUnreadCount'], 120, 2);

            // if (function_exists('add_shortcode')) {
            //     add_shortcode('comments-form', trans('plugins/comments::comments.shortcode_name'), trans('plugins/comments::comments.shortcode_description'), [$this, 'form']);
            //     shortcode()
            //         ->setAdminConfig('comments-form', view('plugins/comments::partials.short-code-admin-config')->render());
            // }
        });
    }

    /**
     * @param string $options
     * @return string
     *
     * @throws \Throwable
     */
    public function registerTopHeaderNotification($options)
    {
        if (Auth::user()->hasPermission('comment.edit')) {
            $comment = $this->setUnreadCommentss();

            if ($comment->count() == 0) {
                return $options;
            }

            return $options . view('plugins/comments::partials.notification', compact('comment'))->render();
        }

        return $options;
    }

    /**
     * @param int $number
     * @param string $menuId
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getUnreadCount($number, $menuId)
    {
        if ($menuId == 'cms-plugins-comments') {
            $unread = count($this->setUnreadCommentss());

            if ($unread > 0) {
                return Html::tag('span', (string)$unread, ['class' => 'badge badge-success'])->toHtml();
            }
        }

        return $number;
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUnreadCommentss(): Collection
    {
        if (!$this->unreadCommentss) {
            $this->unreadCommentss = $this->app->make(CommentsInterface::class)
                ->getUnread(['id', 'name', 'email', 'created_at']);
        }

        return $this->unreadCommentss;
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function form($shortcode)
    {
        $view = apply_filters(CONTACT_FORM_TEMPLATE_VIEW, 'plugins/comments::forms.comments');

        if (defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
            $this->app->booted(function () {
                Theme::asset()
                    ->usePath(false)
                    ->add('comments-css', asset('vendor/core/plugins/comments/css/comments-public.css'), [], [], '1.0.0');

                Theme::asset()
                    ->container('footer')
                    ->usePath(false)
                    ->add('comments-public-js', asset('vendor/core/plugins/comments/js/comments-public.js'),
                        ['jquery'], [], '1.0.0');
            });
        }

        if ($shortcode->view && view()->exists($shortcode->view)) {
            $view = $shortcode->view;
        }

        return view($view)->render();
    }
}
