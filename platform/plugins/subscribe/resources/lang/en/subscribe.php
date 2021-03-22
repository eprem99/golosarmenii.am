<?php

return [
    'menu'                  => 'Subscribe',
    'edit'                  => 'View subscribe',
    'tables'                => [
        'email'     => 'Email',
        'full_name' => 'Full Name',
        'time'      => 'Time',
    ],
    'subscribe_information'   => 'Subscribe information',
    'replies'               => 'Replies',
    'email'                 => [
        'header'  => 'Email',
        'title'   => 'New subscribe from your site',
        'success' => 'Send message successfully!',
        'failed'  => 'Can\'t send message on this time, please try again later!',
    ],
    'form'                  => [
        'name'    => [
            'required' => 'Name is required',
        ],
        'email'   => [
            'required' => 'Email is required',
            'email'    => 'The email address is not valid',
        ],
    ],
    'subscribe_sent_from'     => 'This subscribe information sent from',
    'sender'                => 'Sender',
    'sender_email'          => 'Email',
    'message_content'       => 'Message content',
    'sent_from'             => 'Email sent from',
    'form_name'             => 'Name',
    'form_email'            => 'Email',
    'required_field'        => 'The field with (<span style="color: red">*</span>) is required.',
    'send_btn'              => 'Send message',
    'new_msg_notice'        => 'You have <span class="bold">:count</span> New Messages',
    'view_all'              => 'View all',
    'settings'              => [
        'email' => [
            'title'       => 'Subscribe',
            'description' => 'Subscribe email configuration',
            'templates'   => [
                'notice_title'       => 'Send notice to administrator',
                'notice_description' => 'Email template to send notice to administrator when system get new subscribe',
            ],
        ],
    ],
    'send'                  => 'Send',
    'shortcode_name' => 'Subscribe form',
    'shortcode_description' => 'Add a subscribe form',
    'shortcode_content_description' => 'Add shortcode [subscribe-form][/subscribe-form] to editor?',
    'message_sent_success'  => 'Message sent successfully!',
];
