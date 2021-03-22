<?php

Route::group(['namespace' => 'Botble\Subscribe\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'subscribe', 'as' => 'subscribe.'], function () {

            Route::resource('', 'SubscribeController')->except(['create', 'store'])->parameters(['' => 'subscribe']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'SubscribeController@deletes',
                'permission' => 'subscribe.destroy',
            ]);
        });
    });

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::post('subscribe/send', [
            'as'   => 'public.send.subscribe',
            'uses' => 'PublicController@postSendSubscribe',
        ]);
    });
});
