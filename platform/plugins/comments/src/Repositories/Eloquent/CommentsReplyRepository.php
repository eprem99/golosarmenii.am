<?php

namespace Botble\Comments\Repositories\Eloquent;

use Botble\Comments\Repositories\Interfaces\CommentsReplyInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;

class CommentsReplyRepository extends RepositoriesAbstract implements CommentsReplyInterface
{
    public function getCommentsReplay(int $id)
    {
        $data = $this->model
            ->where([
                'comments_replies.comments_id' => $id,
            ]);

        return $this->applyBeforeExecuteQuery($data)->get();
    }
    public function deleteCommentsReplay(int $id)
    {
        $data = $this->model
            ->delete([
                'comments_replies.id' => $id,
            ]);

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
