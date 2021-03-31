<?php

namespace Botble\userviews\Providers;

use Botble\Shortcode\View\View;
use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\ACL\Models\User;
use Botble\Blog\Repositories\Eloquent\PostRepository;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Illuminate\Support\ServiceProvider;
use Language;
use Note;
use SeoHelper;
use SlugHelper;

/**
 * @since 02/07/2016 09:50 AM
 */
class UserviewsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        SlugHelper::registerModule(User::class, 'User Posts');

        $this->setNamespace('plugins/userviews')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web', 'api'])
            ->publishAssets();

        $this->app->register(UserviewsServiceProvider::class);

        $this->app->booted(function () {
            $models = [User::class];

            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                Language::registerModule($models);
            }

            SeoHelper::registerModule($models);

            $configKey = 'packages.revision.general.supported';
            config()->set($configKey, array_merge(config($configKey, []), [User::class]));

            if (defined('NOTE_FILTER_MODEL_USING_NOTE')) {
                Note::registerModule(User::class);
            }

            $this->app->register(HookServiceProvider::class);
        });

        if (function_exists('shortcode')) {
            view()->composer([
                'plugins/user::themes.post',
            ], function (View $view) {
                $view->withShortcodes();
            });
        }
    }
}
