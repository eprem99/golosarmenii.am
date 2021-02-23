<?php

namespace Botble\Comments\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Base\Models\BaseModel;

class Comments extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comment';

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
        'name',
        'email',
        'content',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => CommentsStatusEnum::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(CommentsReply::class);
    }
}
