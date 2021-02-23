<?php

namespace Botble\Comments\Providers;

use Botble\Base\Traits\LoadAndPublishDataTrait;
use Cookie;
use Illuminate\Contracts\View\View;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Support\ServiceProvider;
use Theme;

class CommentsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot()
    {
        $this->setNamespace('plugins/comments')
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishTranslations()
            ->loadAndPublishViews()
            ->publishAssets();

        // if (defined('THEME_FRONT_FOOTER') && theme_option('comments', 'yes') == 'yes') {
        //     $this->app->resolving(EncryptCookies::class, function (EncryptCookies $encryptCookies) {
        //         $encryptCookies->disableFor(config('plugins.comments.general.cookie_name'));
        //     });

        //     $this->app['view']->composer('plugins/comments::index', function (View $view) {
        //         $commentsConfig = config('plugins.comments.general');

        //      //   $alreadyConsentedWithComments = Cookie::has($commentsConfig['comments_name']);

        //         $view->with(compact('alreadyConsentedWithComments', 'commentsConfig'));
        //     });

        //     if (!$this->app->isDownForMaintenance()) {
        //         Theme::asset()
        //             ->usePath(false)
        //             ->add('comments-css', asset('vendor/core/plugins/comments/css/comments.css'), [], [], '1.0.0');
        //         Theme::asset()
        //             ->container('footer')
        //             ->usePath(false)
        //             ->add('comments-js', asset('vendor/core/plugins/comments/js/commetns.js'),
        //                 ['jquery'], [], '1.0.0');

        //         add_filter(THEME_FRONT_FOOTER, [$this, 'registerComments'], 1346);
        //     }
        // }

        theme_option()
            ->setSection([
                'title'      => trans('plugins/comments::comments.theme_options.name'),
                'desc'       => trans('plugins/comments::comments.theme_options.description'),
                'id'         => 'opt-text-subsection-comments',
                'subsection' => true,
                'icon'       => 'fas fa-cookie-bite',
                'priority'   => 9999,
                'fields'     => [
                    [
                        'id'         => 'comments_enable',
                        'type'       => 'select',
                        'label'      => trans('plugins/comments::comments.theme_options.enable'),
                        'attributes' => [
                            'name'    => 'comments_enable',
                            'list'    => [
                                'yes' => trans('core/base::base.yes'),
                                'no'  => trans('core/base::base.no'),
                            ],
                            'value'   => 'yes',
                            'options' => [
                                'class' => 'form-control',
                            ],
                        ],
                    ]
                ],
            ]);
    }

    /**
     * @param string $html
     * @return string
     * @throws \Throwable
     */
    public function registerComments($html): string
    {
        return $html . view('plugins/comments::index')->render();
    }
}
