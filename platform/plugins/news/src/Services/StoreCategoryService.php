<?php

namespace Botble\News\Services;

use Botble\News\Models\Post;
use Botble\News\Services\Abstracts\StoreCategoryServiceAbstract;
use Illuminate\Http\Request;

class StoreCategoryService extends StoreCategoryServiceAbstract
{

    /**
     * @param Request $request
     * @param Post $post
     * @return mixed|void
     */
    public function execute(Request $request, Post $post)
    {
        $categories = $request->input('categories');
        if (!empty($categories) && is_array($categories)) {
            $post->categories()->sync($categories);
        }
    }
}
