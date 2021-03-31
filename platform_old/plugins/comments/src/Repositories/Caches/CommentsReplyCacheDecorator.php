<?php

namespace Botble\Comments\Repositories\Caches;

use Botble\Comments\Repositories\Interfaces\CommentsReplyInterface;
use Botble\Support\Repositories\Caches\CacheAbstractDecorator;

class CommentsReplyCacheDecorator extends CacheAbstractDecorator implements CommentsReplyInterface
{
    public function getCommentsReplay($id)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }
}

