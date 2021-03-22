<?php

namespace Botble\Comments\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Traits\HasDeleteManyItemsTrait;
use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Comments\Forms\CommentsForm;
use Botble\Comments\Http\Requests\CommentsReplyRequest;
use Botble\Comments\Http\Requests\EditCommentsRequest;
use Botble\Comments\Repositories\Interfaces\CommentsReplyInterface;
use Botble\Comments\Tables\CommentsTable;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Botble\Setting\Supports\SettingStore;
use EmailHandler;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;

class CommentsController extends BaseController
{
    use HasDeleteManyItemsTrait;

    /**
     * @var CommentsInterface
     */
    protected $commentsRepository;
    /**
     * @var CommentsInterface
     */
    protected $commentsReplyRepository;
    /**
     * @param CommentsInterface $commentsRepository
     */
    public function __construct(CommentsInterface $commentsRepository, CommentsReplyInterface $commentsReplyRepository)
    {
        $this->commentsRepository = $commentsRepository;
        $this->commentsReplyRepository = $commentsReplyRepository;
    }

    /**
     * @param CommentsTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(CommentsTable $dataTable)
    {
        page_title()->setTitle(trans('plugins/comments::comments.menu'));

        return $dataTable->renderTable();
    }

    /**
     * @param $id
     * @param FormBuilder $formBuilder
     * @param Request $request
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        page_title()->setTitle(trans('plugins/comments::comments.edit'));

        $comments = $this->commentsRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $comments));

        return $formBuilder->create(CommentsForm::class, ['model' => $comments])->renderForm();
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, EditCommentsRequest $request, BaseHttpResponse $response)
    {
        $comments = $this->commentsRepository->findOrFail($id);

        $comments->fill($request->input());

        $this->commentsRepository->createOrUpdate($comments);

        event(new UpdatedContentEvent(COMMENTS_MODULE_SCREEN_NAME, $request, $comments));

        return $response
            ->setPreviousUrl(route('comment.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy($id, Request $request, BaseHttpResponse $response)
    {
        try {
            $comments = $this->commentsRepository->findOrFail($id);
            $this->commentsRepository->delete($comments);
            event(new DeletedContentEvent(COMMENTS_MODULE_SCREEN_NAME, $request, $comments));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }
    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        return $this->executeDeleteItems($request, $response, $this->commentsRepository, COMMENTS_MODULE_SCREEN_NAME);
    }

    /**
     * @param int $id
     * @param CommentsReplyRequest $request
     * @param BaseHttpResponse $response
     * @param CommentsReplyInterface $commentsReplyRepository
     * @return BaseHttpResponse
     */
    public function postReply(
        $id,
        CommentsReplyRequest $request,
        BaseHttpResponse $response,
        CommentsReplyInterface $commentsReplyRepository
    ) {
        $comments = $this->commentsRepository->findOrFail($id);

        EmailHandler::send($request->input('message'), 'Re: ' . $comments->subject, $comments->email);

        $commentsReplyRepository->create([
            'message'    => $request->input('message'),
            'comments_id' => $id,
        ]);

        $comments->status = CommentsStatusEnum::READ();
        $this->commentsRepository->createOrUpdate($comments);

        return $response
            ->setMessage(trans('plugins/comments::comments.message_sent_success'));
    }

    public function postReplyDelete(
        $id, Request $request, BaseHttpResponse $response, CommentsReplyInterface $commentsReplyRepository
    ) {
        try {
            $comments = $this->commentsReplyRepository->findOrFail($id);
            $this->commentsReplyRepository->delete($comments);
            event(new DeletedContentEvent(COMMENTS_MODULE_SCREEN_NAME, $request, $comments));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }

    }

}
