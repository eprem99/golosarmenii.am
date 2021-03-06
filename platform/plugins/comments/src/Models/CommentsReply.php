<?php

namespace Botble\Comments\Models;

use Botble\Base\Models\BaseModel;

class CommentsReply extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments_replies';

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message',
        'comments_id',
    ];


    /**
     * {@inheritDoc}
     */
    public function getCommentsReplay($comments_id)
    {
        $data = $this->model->select('comments_replies.*');
        $data = $data->where('comments_replies.comments_id', $comments_id);

        return $this->applyBeforeExecuteQuery($data);
    }

}
