<?php

namespace Botble\Comments\Posts;

use Botble\Base\Traits\EnumCastable;
// use Botble\Base\Supports\Enum;
use Html;

/**
 * @method static CommentsStatusEnum UNREAD()
 * @method static CommentsStatusEnum READ()
 */
// class CommentsTitlePosts extends TableAbstract
// {
//     public const READ = 'approve';
//     public const UNREAD = 'unapprove';

//     /**
//      * @var string
//      */
//     public static $langPath = 'plugins/comments::comments.statuses';

//     /**
//      * @return string
//      */
//     public function toHtml()
//     {
//         switch ($this->value) {
//             case self::UNREAD:
//                 return Html::tag('span', self::UNREAD()->label(), ['class' => 'label-warning status-label'])
//                     ->toHtml();
//             case self::READ:
//                 return Html::tag('span', self::READ()->label(), ['class' => 'label-success status-label'])
//                     ->toHtml();
//             default:
//                 return parent::toHtml();
//         }
//     }
// }
