<?php

namespace Botble\ACL\Services;

use Botble\ACL\Models\User;
use Botble\ACL\Repositories\Interfaces\UserInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Eloquent;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use SeoHelper;
use Theme;

class UserService
{
    /**
     * @param Eloquent $slug
     * @return array|Eloquent
     */
    public function handleFrontRoutes($slug)
    {
        if (!$slug instanceof Eloquent) {
            return $slug;
        }

        $condition = [
            'id'     => $slug->reference_id
        ];

        if (Auth::check() && request()->input('preview')) {
            Arr::forget($condition, 'status');
        }

        if ($slug->reference_type !== User::class) {
            return $slug;
        }

        $user = app(UserInterface::class)->getFirstBy($condition, ['*'], ['slugable']);

        if (empty($user)) {
            abort(404);
        }

        SeoHelper::setTitle($user->name)
            ->setDescription($user->description);

        $meta = new SeoOpenGraph;

        $meta->setDescription($user->description);
        $meta->setUrl($user->url);
        $meta->setTitle($user->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        if ($user->template) {
            Theme::uses(Theme::getThemeName())
                ->layout($user->template);
        }

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add($user->name, $user->url);

        do_action(BASE_ACTION_PUBLIC_RENDER_SINGLE, USER_MODULE_SCREEN_NAME, $user);

        return [
            'view'         => 'user',
            'default_view' => 'packages/user::themes.user',
            'data'         => compact('user'),
            'slug'         => $user->slug,
        ];
    }
}
