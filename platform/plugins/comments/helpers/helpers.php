<?php

use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Botble\Comments\Repositories\Interfaces\CommentsReplyInterface;

if (!function_exists('getComments')) {
    /**
     * @param int $id
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    function getComments($id)
    {
        return app(CommentsInterface::class)->getComments($id);
    }
    function getCommentsReplay($id)
    {
        return app(CommentsReplyInterface::class)->getCommentsReplay($id);
    }
    function postTitle($id)
    {
        return app(CommentsInterface::class)->postTitle($id);
    }
}