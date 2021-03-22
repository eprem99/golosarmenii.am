<?php

namespace Botble\Subscribe\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Subscribe\Events\SentSubscribeEvent;
use Botble\Subscribe\Http\Requests\SubscribeRequest;
use Botble\Subscribe\Repositories\Interfaces\SubscribeInterface;
use EmailHandler;
use Exception;
use Illuminate\Routing\Controller;

class PublicController extends Controller
{
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
     * @param SubscribeRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws \Throwable
     */
    public function postSendSubscribe(SubscribeRequest $request, BaseHttpResponse $response)
    {
        try {
            $subscribe = $this->subscribeRepository->getModel();
            $subscribe->fill($request->input());
            $this->subscribeRepository->createOrUpdate($subscribe);

            event(new SentSubscribeEvent($subscribe));

            EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'subscribe_name'    => $subscribe->name ?? 'N/A',
                    'subscribe_email'   => $subscribe->email ?? 'N/A',
                ])
                ->sendUsingTemplate('notice');

            return $response->setMessage(__('Send message successfully!'));
        } catch (Exception $exception) {
            info($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(trans('plugins/subscribe::subscribe.email.failed'));
        }
    }
}
