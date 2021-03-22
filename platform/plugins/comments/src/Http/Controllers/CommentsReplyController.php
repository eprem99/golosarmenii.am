<?php

namespace Botble\Comments\Http\CommentsReplyControllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Traits\HasDeleteManyItemsTrait;
use Botble\Comments\Repositories\Interfaces\CommentsReplyInterface;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Illuminate\Http\Request;


class CommentsReplyController extends BaseController
{
    use HasDeleteManyItemsTrait;

    /**
     * @var CommentsReplyInterface
     */
    protected $commentsReplyRepository;

    /**
     * @param CommentsReplyInterface $commentsReplyRepository
     */
    public function __construct(CommentsInterface $commentsReplyRepository)
    {
        $this->commentsReplyRepository = $commentsReplyRepository;
    }

    public function deletes(Request $request, BaseHttpResponse $response)
    {
        return $this->executeDeleteItems($request, $response, $this->commentsReplyRepository, COMMENTS_MODULE_SCREEN_NAME);
    }

    public function postReplyDelete(
        $id,
        BaseHttpResponse $response,
        CommentsReplyInterface $commentsReplyRepository
    ) {

         $comments = $this->$commentsReplyRepository->deleteCommentsReplay($id);
        // $commentsReplyRepository->delete($comments);

        return $response
            ->setMessage(trans($comments));
    }

    // public function postReplyDelete(int $id, BaseHttpResponse $response)
    // {
    //   //  $this->commentsReplyRepository::find($id);
    //     $data = $this->commentsReplyRepository->findOrFail($id);
    //     $data-> delete();
    //     return $response
    //         ->setMessage(trans('plugins/comments::comments.message_sent_success'));
    // }

}
