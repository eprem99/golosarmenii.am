<?php

namespace Botble\Comments\Http\Requests;

use Botble\Support\Http\Requests\Request;

class CommentsReplyRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required',
        ];
    }
}
