<?php

namespace Botble\Subscribe\Providers;

use EmailHandler;
use Illuminate\Routing\Events\RouteMatched;
use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Subscribe\Models\SubscribeReply;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use Botble\Subscribe\Models\Subscribe;
use Botble\Subscribe\Repositories\Caches\SubscribeCacheDecorator;
use Botble\Subscribe\Repositories\Eloquent\SubscribeRepository;
use Event;
use Illuminate\Support\ServiceProvider;

class SubscribeServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(SubscribeInterface::class, function () {
            return new SubscribeCacheDecorator(new SubscribeRepository(new Subscribe));
        });


        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/subscribe')
            ->loadAndPublishConfigurations(['permissions', 'email'])
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-subscribe',
                'priority'    => 120,
                'parent_id'   => null,
                'name'        => 'plugins/subscribe::subscribe.menu',
                'icon'        => 'far fa-envelope',
                'url'         => route('subscribe.index'),
                'permissions' => ['subscribe.index'],
            ]);

            EmailHandler::addTemplateSettings(CONTACT_MODULE_SCREEN_NAME, config('plugins.subscribe.email', []));
        });

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
