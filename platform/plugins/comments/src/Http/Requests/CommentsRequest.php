<?php

namespace Botble\Comments\Http\Requests;

use Botble\Support\Http\Requests\Request;

class CommentsRequest extends Request
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
                'content'              => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ];
        }
        return [
            'name'    => 'required',
            'email'   => 'required|email',
            'content' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'    => trans('plugins/comments::comments.form.name.required'),
            'email.required'   => trans('plugins/comments::comments.form.email.required'),
            'email.email'      => trans('plugins/comments::comments.form.email.email'),
            'content.required' => trans('plugins/comments::comments.form.content.required'),
        ];
    }
}
