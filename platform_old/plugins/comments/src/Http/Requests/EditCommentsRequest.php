<?php

namespace Botble\Comments\Http\Requests;

use Botble\Comments\Enums\CommentsStatusEnum;
use Botble\Support\Http\Requests\Request;
use Illuminate\Validation\Rule;

class EditCommentsRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => Rule::in(CommentsStatusEnum::values()),
        ];
    }
}
