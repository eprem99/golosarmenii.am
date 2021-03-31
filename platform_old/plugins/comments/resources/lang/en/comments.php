<?php

return [
    'menu'                  => 'Comments',
    'edit'                  => 'View comment',
    'tables'                => [
        'post_id'     => 'Post',
        'email'     => 'Email',
        'full_name' => 'Full Name',
        'time'      => 'Time',
        'content'   => 'Content',
    ],
    'comments_information'   => 'Comments information',
    'replies'               => 'Replies',
    'email'                 => [
        'header'  => 'Email',
        'title'   => 'New comments from your site',
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
        'content' => [
            'required' => 'Content is required',
        ],
    ],
    'comments_sent_from'     => 'This comments information sent from',
    'sender'                => 'Sender',
    'sender_email'          => 'Email',
    'message_content'       => 'Message content',
    'sent_from'             => 'Email sent from',
    'form_name'             => 'Name',
    'post_id'               => 'Post',
    'form_email'            => 'Email',
    'form_message'          => 'Message',
    'required_field'        => 'The field with (<span style="color: red">*</span>) is required.',
    'send_btn'              => 'Send message',
    'new_msg_notice'        => 'You have <span class="bold">:count</span> New Messages',
    'view_all'              => 'View all',
    'statuses'              => [
        'approve'   => 'Approve',
        'unapprove' => 'Unapprove',
    ],
    'message'               => 'Message',
    'settings'              => [
        'email' => [
            'title'       => 'Comments',
            'description' => 'Comments email configuration',
            'templates'   => [
                'notice_title'       => 'Send notice to administrator',
                'notice_description' => 'Email template to send notice to administrator when system get new comments',
            ],
        ],
    ],
    'no_reply'              => 'No reply yet!',
    'reply'                 => 'Reply',
    'send'                  => 'Send',
    'shortcode_name' => 'Comments form',
    'shortcode_description' => 'Add a comments form',
    'shortcode_content_description' => 'Add shortcode [comments-form][/comments-form] to editor?',
    'message_sent_success'  => 'Message sent successfully!',
];
