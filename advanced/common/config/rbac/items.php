<?php
return [
    'user' => [
        'type' => 1,
        'description' => 'RegularUser',
        'ruleName' => 'userRole',
    ],
    'admin' => [
        'type' => 1,
        'description' => 'AdminUser',
        'ruleName' => 'userRole',
        'children' => [
            'user',
        ],
    ],
];
