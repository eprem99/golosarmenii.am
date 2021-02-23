<?php

namespace Botble\Comments\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Comments\Events\SentCommentsEvent;
use Botble\Comments\Http\Requests\CommentsRequest;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use EmailHandler;
use Exception;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
    /**
     * @var CommentsInterface
     */
    protected $commentsRepository;

    /**
     * @param CommentsInterface $commentsRepository
     */
    public function __construct(CommentsInterface $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    /**
     * @param CommentsRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws \Throwable
     */
    public function postSendComments(CommentsRequest $request, BaseHttpResponse $response)
    {
        try {
            $comments = $this->commentsRepository->getModel();
            $comments->fill($request->input());
            $this->commentsRepository->createOrUpdate($comments);

            event(new SentCommentsEvent($comments));

            EmailHandler::setModule(COMMENTS_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'comments_name'    => $comments->name ?? 'N/A',
                    'comments_subject' => $comments->subject ?? 'N/A',
                    'comments_email'   => $comments->email ?? 'N/A',
                    'comments_content' => $comments->content ?? 'N/A',
                ])
                ->sendUsingTemplate('notice');

            return $response->setMessage(__('Send message successfully!'));
        } catch (Exception $exception) {
            info($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(trans('plugins/comments::comments.email.failed'));
        }
    }
}
