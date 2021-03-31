<?php

namespace Botble\Comments\Enums;

use Botble\Base\Supports\Enum;
use Html;

/**
 * @method static CommentsStatusEnum UNREAD()
 * @method static CommentsStatusEnum READ()
 */
class CommentsStatusEnum extends Enum
{
    public const READ = 'approve';
    public const UNREAD = 'unapprove';

    /**
     * @var string
     */
    public static $langPath = 'plugins/comments::comments.statuses';

    /**
     * @return string
     */
    public function toHtml()
    {
        switch ($this->value) {
            case self::UNREAD:
                return Html::tag('span', self::UNREAD()->label(), ['class' => 'label-warning status-label'])
                    ->toHtml();
            case self::READ:
                return Html::tag('span', self::READ()->label(), ['class' => 'label-success status-label'])
                    ->toHtml();
            default:
                return parent::toHtml();
        }
    }
}
