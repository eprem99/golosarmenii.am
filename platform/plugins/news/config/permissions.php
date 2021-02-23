<?php

return [
    [
        'name' => 'News',
        'flag' => 'plugins.news',
    ],
    [
        'name'        => 'Posts',
        'flag'        => 'posts.index',
        'parent_flag' => 'plugins.news',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'posts.create',
        'parent_flag' => 'posts.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'posts.edit',
        'parent_flag' => 'posts.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'posts.destroy',
        'parent_flag' => 'posts.index',
    ],

    [
        'name'        => 'Categories',
        'flag'        => 'categories.index',
        'parent_flag' => 'plugins.news',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'categories.create',
        'parent_flag' => 'categories.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'categories.edit',
        'parent_flag' => 'categories.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'categories.destroy',
        'parent_flag' => 'categories.index',
    ],

    [
        'name'        => 'Tags',
        'flag'        => 'tags.index',
        'parent_flag' => 'plugins.news',
    ],
    [
        'name'        => 'Create',
        'flag'        => 'tags.create',
        'parent_flag' => 'tags.index',
    ],
    [
        'name'        => 'Edit',
        'flag'        => 'tags.edit',
        'parent_flag' => 'tags.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'tags.destroy',
        'parent_flag' => 'tags.index',
    ],
];