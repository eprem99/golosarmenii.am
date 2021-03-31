<?php

namespace Botble\Subscribe\Http\Requests;

use Botble\Support\Http\Requests\Request;

class SubscribeRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function rules()
    {
        if (setting('enable_captcha') && is_plugin_active('captcha')) {
            return [
                'name'                 => 'required',
                'email'                => 'required|email',
                'g-recaptcha-response' => 'required|captcha',
            ];
        }
        return [
            'name'    => 'required',
            'email'   => 'required|email',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'    => trans('plugins/subscribe::subscribe.form.name.required'),
            'email.required'   => trans('plugins/subscribe::subscribe.form.email.required'),
            'email.email'      => trans('plugins/subscribe::subscribe.form.email.email'),
        ];
    }
}
