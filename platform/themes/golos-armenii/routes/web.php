<?php

// Custom routes
// You can delete this route group if you don't need to add your custom routes.
Route::group(['namespace' => 'Theme\GolosArmenii\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        // Add your custom route here
        // Ex: Route::get('hello', 'GolosArmeniiController@getHello');

    });
});

Theme::routes();

Route::group(['namespace' => 'Theme\GolosArmenii\Http\Controllers', 'middleware' => ['web', 'core']], function () {
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::get('/', 'GolosArmeniiController@getIndex')->name('public.index');

        // Route::get('sitemap.xml', [
        //     'as'   => 'public.sitemap',
        //     'uses' => 'GolosArmeniiController@getSiteMap',
        // ]);

        Route::get('{slug?}' . config('core.base.general.public_single_ending_url'), [
            'as'   => 'public.single',
            'uses' => 'GolosArmeniiController@getView',
        ]);
    });
});

// Route::group(['namespace' => 'Botble\Blog\Http\Controllers', 'middleware' => ['web', 'core']], function () {
//     Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
//         Route::get('calendar', [
//             'as'   => 'public.calendar',
//             'uses' => 'PublicController@getCalendar',
//         ]);
//     });
// });