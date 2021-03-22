<?php

return [
    'name'        => 'plugins/subscribe::subscribe.settings.email.title',
    'description' => 'plugins/subscribe::subscribe.settings.email.description',
    'templates'   => [
        'notice' => [
            'title'       => 'plugins/subscribe::subscribe.settings.email.templates.notice_title',
            'description' => 'plugins/subscribe::subscribe.settings.email.templates.notice_description',
            'subject'     => 'New subscribe from {{ site_title }}',
            'can_off'     => true,
        ],
    ],
    'variables'   => [
        'subscribe_name'    => 'Subscribe name',
        'subscribe_email'   => 'Subscribe email',
    ],
];
