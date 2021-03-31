<?php

namespace Botble\Facebook\Listeners;

use Botble\Base\Events\CreatedContentEvent;
use Botble\Facebook\Supports\FacebookSdk;
use Exception;
use Illuminate\Support\Str;

class CreatedContentListener
{
    /**
     * Handle the event.
     *
     * @param CreatedContentEvent $event
     * @return void
     *
     */
    public function handle(CreatedContentEvent $event)
    {
        if (setting('facebook_access_token') && setting('facebook_auto_post_to_fan_page', 0)) {
            if (in_array($event->screen, config('plugins.facebook.general.screen_supported_auto_post', [])) &&
                $event->request->input('facebook_auto_post') == 1
            ) {
                try {
                    $pageId = setting('facebook_page_id');
                    $pageToken = null;
                    if (!empty($pageId)) {
                        $pages = setting('facebook_list_pages', []);
                        $pages = json_decode($pages, true);
                        foreach ($pages as $page) {
                            if ($page['id'] == $pageId) {
                                $pageToken = $page['access_token'];
                                break;
                            }
                        }
                        if (!empty($pageToken)) {
                            $content = $event->data->description ?? Str::limit($event->data->content, 120);
                            $content = str_replace('&nbsp', ' ', strip_tags($content));
                            app(FacebookSdk::class)->post('' . $pageId . '/feed', [
                                'message' => $content,
                                'link'    => $event->data->url,
                            ], $pageToken);
                        }
                    }
                } catch (Exception $exception) {
                    info($exception->getMessage());
                }
            }
        }
    }
}
