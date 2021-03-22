<?php

return [
    [
        'name' => 'Subscribe',
        'flag' => 'subscribe.index',
    ],
    [
        'name'        => 'Delete',
        'flag'        => 'subscribe.destroy',
        'parent_flag' => 'subscribe.index',
    ],
];
