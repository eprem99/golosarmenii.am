<?php

namespace Botble\Subscribe\Forms;

use Assets;
use Botble\Base\Forms\FormAbstract;
use Botble\Subscribe\Http\Requests\EditSubscribeRequest;
use Botble\Subscribe\Models\Subscribe;

class SubscribeForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {

        Assets::addScriptsDirectly('vendor/core/plugins/subscribe/js/subscribe.js')
            ->addStylesDirectly('vendor/core/plugins/subscribe/css/subscribe.css');

        $this
            ->setupModel(new Subscribe)
            ->setValidatorClass(EditSubscribeRequest::class)
            ->withCustomFields()
            ->addMetaBoxes([
                'information' => [
                    'title'      => trans('plugins/subscribe::subscribe.subscribe_information'),
                    'content'    => view('plugins/subscribe::subscribe-info', ['subscribe' => $this->getModel()])->render(),
                    'attributes' => [
                        'style' => 'margin-top: 0',
                    ],
                ],
            ]);
    }
}
