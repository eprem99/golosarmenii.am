<?php

namespace Theme\GolosArmenii\Http\Controllers;
use Botble\Theme\Http\Controllers\PublicController;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Blog\Models\Post;
use SeoHelper;
use Theme;
class GolosArmeniiController extends PublicController
{
    public function getAuthor($slug) {
        if (!$slug) {
            abort(404);
        }
        $user = get_autor_info($slug);
       // var_dump($user[0]);
        SeoHelper::setTitle(__('Author page: ') . $user[0]->first_name.' '.$user[0]->last_name)
            ->setDescription(__('Author page: ') . $user[0]->first_name.' '.$user[0]->last_name);
             
            $posts = get_posts_by_user($slug);
            // Post::where('author_id', $slug)->where('posts.status', BaseStatusEnum::PUBLISHED)->orderBy('created_at', 'desc')->limit(12)->get();
   
        // Theme::breadcrumb()
        //     ->add(__('Home'), url('/'))
        //     ->add(__('Search result for: ') . '"Author"', route('public.author'));

        return Theme::scope('author', compact('posts', 'slug', 'user'))->render();
    }
}
