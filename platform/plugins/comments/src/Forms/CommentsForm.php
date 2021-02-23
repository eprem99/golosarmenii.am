<?php

namespace Botble\Comments\Forms;

use Assets;
use Botble\Base\Forms\FormAbstract;
use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Comments\Http\Requests\EditCommentsRequest;
use Botble\Comments\Models\Comments;

class CommentsForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {

        Assets::addScriptsDirectly('vendor/core/plugins/comments/js/comments.js')
            ->addStylesDirectly('vendor/core/plugins/comments/css/comments.css');

        $this
            ->setupModel(new Comments)
            ->setValidatorClass(EditCommentsRequest::class)
            ->withCustomFields()
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'choices'    => CommentsStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status')
            ->addMetaBoxes([
                'information' => [
                    'title'      => trans('plugins/comments::comments.comments_information'),
                    'content'    => view('plugins/comments::comments-info', ['comments' => $this->getModel()])->render(),
                    'attributes' => [
                        'style' => 'margin-top: 0',
                    ],
                ],
                'replies' => [
                    'title'      => trans('plugins/comments::comments.replies'),
                    'content'    => view('plugins/comments::reply-box', ['comments' => $this->getModel()])->render(),
                ],
            ]);
    }
}
