<?php

namespace Botble\Subscribe\Providers;

use Html;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Theme;

class HookServiceProvider extends ServiceProvider
{
    /**
     * @var Collection
     */
    protected $unreadSubscribes = [];

    /**
     * @throws \Throwable
     */
    public function boot()
    {
        $this->app->booted(function () {
            add_filter(BASE_FILTER_TOP_HEADER_LAYOUT, [$this, 'registerTopHeaderNotification'], 120);
            add_filter(BASE_FILTER_APPEND_MENU_NAME, [$this, 'getUnreadCount'], 120, 2);

            if (function_exists('add_shortcode')) {
                add_shortcode('subscribe-form', trans('plugins/subscribe::subscribe.shortcode_name'), trans('plugins/subscribe::subscribe.shortcode_description'), [$this, 'form']);
                shortcode()
                    ->setAdminConfig('subscribe-form', view('plugins/subscribe::partials.short-code-admin-config')->render());
            }
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
        if (Auth::user()->hasPermission('subscribe.edit')) {
            $subscribe = $this->setUnreadSubscribes();

            if ($subscribe->count() == 0) {
                return $options;
            }

            return $options . view('plugins/subscribe::partials.notification', compact('subscribe'))->render();
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
        if ($menuId == 'cms-plugins-subscribe') {
            $unread = count($this->setUnreadSubscribes());

            if ($unread > 0) {
                return Html::tag('span', (string)$unread, ['class' => 'badge badge-success'])->toHtml();
            }
        }

        return $number;
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected function setUnreadSubscribes(): Collection
    {
        if (!$this->unreadSubscribes) {
            $this->unreadSubscribes = $this->app->make(SubscribeInterface::class)
                ->getUnread(['id', 'name', 'email', 'created_at']);
        }

        return $this->unreadSubscribes;
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function form($shortcode)
    {
        $view = apply_filters(CONTACT_FORM_TEMPLATE_VIEW, 'plugins/subscribe::forms.subscribe');

        if (defined('THEME_OPTIONS_MODULE_SCREEN_NAME')) {
            $this->app->booted(function () {
                Theme::asset()
                    ->usePath(false)
                    ->add('subscribe-css', asset('vendor/core/plugins/subscribe/css/subscribe-public.css'), [], [], '1.0.0');

                Theme::asset()
                    ->container('footer')
                    ->usePath(false)
                    ->add('subscribe-public-js', asset('vendor/core/plugins/subscribe/js/subscribe-public.js'),
                        ['jquery'], [], '1.0.0');
            });
        }

        if ($shortcode->view && view()->exists($shortcode->view)) {
            $view = $shortcode->view;
        }

        return view($view)->render();
    }
}
