<?php
use Botble\ACL\Models\User;

Route::group(['namespace' => 'Botble\Userviews\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        if (SlugHelper::getPrefix(User::class)) {
            Route::get(SlugHelper::getPrefix(User::class) . '/{slug}', [
                'uses' => 'PublicController@getUser',
            ]);
        }
    });
});
