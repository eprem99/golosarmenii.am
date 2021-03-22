<?php

namespace Botble\Subscribe\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Base\Traits\HasDeleteManyItemsTrait;
use Botble\Subscribe\Forms\SubscribeForm;
use Botble\Subscribe\Http\Requests\EditSubscribeRequest;
use Botble\Subscribe\Tables\SubscribeTable;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use EmailHandler;
use Exception;
use Illuminate\Http\Request;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;

class SubscribeController extends BaseController
{
    use HasDeleteManyItemsTrait;

    /**
     * @var SubscribeInterface
     */
    protected $subscribeRepository;

    /**
     * @param SubscribeInterface $subscribeRepository
     */
    public function __construct(SubscribeInterface $subscribeRepository)
    {
        $this->subscribeRepository = $subscribeRepository;
    }

    /**
     * @param SubscribeTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(SubscribeTable $dataTable)
    {
        page_title()->setTitle(trans('plugins/subscribe::subscribe.menu'));

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
        page_title()->setTitle(trans('plugins/subscribe::subscribe.edit'));

        $subscribe = $this->subscribeRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $subscribe));

        return $formBuilder->create(SubscribeForm::class, ['model' => $subscribe])->renderForm();
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, EditSubscribeRequest $request, BaseHttpResponse $response)
    {
        $subscribe = $this->subscribeRepository->findOrFail($id);

        $subscribe->fill($request->input());

        $this->subscribeRepository->createOrUpdate($subscribe);

        event(new UpdatedContentEvent(SUBSCIBES_MODULE_SCREEN_NAME, $request, $subscribe));

        return $response
            ->setPreviousUrl(route('subscribe.index'))
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
            $subscribe = $this->subscribeRepository->findOrFail($id);
            $this->subscribeRepository->delete($subscribe);
            event(new DeletedContentEvent(SUBSCIBES_MODULE_SCREEN_NAME, $request, $subscribe));

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
        return $this->executeDeleteItems($request, $response, $this->subscribeRepository, SUBSCIBES_MODULE_SCREEN_NAME);
    }
}
