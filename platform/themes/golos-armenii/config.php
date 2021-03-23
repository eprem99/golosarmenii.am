<?php

use Botble\Theme\Theme;

return [

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials" and "views"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => [

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before'             => function (Theme $theme) {
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme'  => function (Theme $theme) {
            // You may use this event to set up your assets.

            $theme
                ->asset()
                ->usePath()
                ->add('daterangepicker-css', 'css/daterangepicker.css', [], [], '1.0.0');

            $theme
                ->asset()
                ->usePath()
                ->add('bootstrap-css', 'css/bootstrap.min.css', [], [], '5.0.0');

            $theme
                ->asset()
                ->usePath()
                ->add('golos-armenii-css', 'css/golos-armenii.css', [], [], '2.0.2');

            $theme
                ->asset()
                ->container('footer')
                ->usePath()
                ->add('golos-armenii-js', 'js/golos-armenii.js', [], [], '2.0.2');
            
            $theme
                ->asset()
                ->container('footer')
                ->usePath()
                ->add('moment-js', 'js/moment.js', [], [], '1');

            $theme
                ->asset()
                ->container('footer')
                ->usePath()
                ->add('daterangepicker-js', 'js/jquery.daterangepicker.min.js', [], [], '1');
                
            $theme
                ->asset()
                ->container('footer')
                ->usePath()
                ->add('custom-js', 'js/custom.js', [], [], '1');

            $theme
                ->asset()
                ->container('footer')
                ->usePath()
                ->add('bootstrap-js', 'js/bootstrap.min.js', [], [], '1');
                
            if (function_exists('shortcode')) {
                $theme->composer(['page', 'post', 'index', 'category', 'tag', 'gallery'],
                    function (\Botble\Shortcode\View\View $view) {
                        $view->withShortcodes();
                    });
            }
        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => [

            'default' => function (Theme $theme) {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            },
        ],
    ],
];
