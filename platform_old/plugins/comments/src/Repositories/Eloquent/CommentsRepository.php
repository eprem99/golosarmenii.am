<?php

namespace Botble\Comments\Repositories\Eloquent;

use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Botble\Support\Repositories\Eloquent\RepositoriesAbstract;
use Illuminate\Support\Facades\DB;


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
    /**
     * {@inheritDoc}
     */
    public function getComments(int $id)
    {
        $data = $this->model
            ->where([
                'comment.post_id' => $id,
            ]);

        return $this->applyBeforeExecuteQuery($data)->get();
    }
    public function postTitle(int $id)
    {
        $data  =  DB::table('posts')
            ->where('posts.id','=', $id)
            ->select('posts.name');
       // DB::raw('select * from occasion_categories')
      //  $data  = $this->hasMany('posts', 'id', $id);

        return $this->applyBeforeExecuteQuery($data)->get();
    }
}
