<?php

return [
    'name'        => 'plugins/comments::comments.settings.email.title',
    'description' => 'plugins/comments::comments.settings.email.description',
    'templates'   => [
        'notice' => [
            'title'       => 'plugins/comments::comments.settings.email.templates.notice_title',
            'description' => 'plugins/comments::comments.settings.email.templates.notice_description',
            'subject'     => 'New comments from {{ site_title }}',
            'can_off'     => true,
        ],
    ],
    'variables'   => [
        'comments_name'    => 'Comments name',
        'comments_subject' => 'Comments subject',
        'comments_email'   => 'Comments email',
        'comments_content' => 'Comments content',
    ],
];
