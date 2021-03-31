<?php

Route::group(['namespace' => 'Botble\Comments\Http\Controllers', 'middleware' => ['web', 'core']], function () {

    Route::group(['prefix' => BaseHelper::getAdminPrefix(), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {

            Route::resource('', 'CommentsController')->except(['create', 'store'])->parameters(['' => 'comments']);

            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'CommentsController@deletes',
                'permission' => 'comment.destroy',
            ]);

            Route::post('reply/{id}', [
                'as'   => 'reply',
                'uses' => 'CommentsController@postReply',
            ]);

            Route::post('postReplyDelete/{id}', [
                'as'   => 'postReplyDelete',
                'uses' => 'CommentsController@postReplyDelete',
                'permission' => 'comment.destroy',
            ]);
        });
    });

    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {
        Route::post('comments/send', [
            'as'   => 'public.send.comments',
            'uses' => 'PublicController@postSendComments',
        ]);
    });
});
