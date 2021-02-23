<?php

namespace Botble\Comments\Repositories\Eloquent;

use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;

class CommentsRepository extends RepositoriesAbstract implements CommentsInterface
{
    /**
     * {@inheritDoc}
     */
    public function getUnread($select = ['*'])
    {
        $data = $this->model->where('status', CommentsStatusEnum::UNREAD)->select($select)->get();
        $this->resetModel();
        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function countUnread()
    {
        $data = $this->model->where('status', CommentsStatusEnum::UNREAD)->count();
        $this->resetModel();
        return $data;
    }
}
