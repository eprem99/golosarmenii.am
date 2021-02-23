<?php

namespace Botble\Comments\Providers;

use EmailHandler;
use Illuminate\Routing\Events\RouteMatched;
use Botble\Base\Supports\Helper;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Comments\Models\CommentsReply;
use Botble\Comments\Repositories\Caches\CommentsReplyCacheDecorator;
use Botble\Comments\Repositories\Eloquent\CommentsReplyRepository;
use Botble\Comments\Repositories\Interfaces\CommentsInterface;
use Botble\Comments\Models\Comments;
use Botble\Comments\Repositories\Caches\CommentsCacheDecorator;
use Botble\Comments\Repositories\Eloquent\CommentsRepository;
use Botble\Comments\Repositories\Interfaces\CommentsReplyInterface;
use Event;
use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(CommentsInterface::class, function () {
            return new CommentsCacheDecorator(new CommentsRepository(new Comments));
        });

        $this->app->bind(CommentsReplyInterface::class, function () {
            return new CommentsReplyCacheDecorator(new CommentsReplyRepository(new CommentsReply));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/comments')
            ->loadAndPublishConfigurations(['permissions', 'email'])
            ->loadRoutes(['web'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->loadMigrations()
            ->publishAssets();

        Event::listen(RouteMatched::class, function () {
            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-comments',
                'priority'    => 40,
                'parent_id'   => null,
                'name'        => 'plugins/comments::comments.menu',
                'icon'        => 'far fa-comments',
                'url'         => route('comment.index'),
                'permissions' => ['comment.index'],
            ]);

            EmailHandler::addTemplateSettings(CONTACT_MODULE_SCREEN_NAME, config('plugins.comments.email', []));
        });

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
