<?php
return [
    'dashboard' => [
        'type' => 2,
        'description' => 'Панель вебмастера',
    ],
    'adminka' => [
        'type' => 2,
        'description' => 'Адинка',
    ],
    'advertboard' => [
        'type' => 2,
        'description' => 'Панель рекламодателя',
    ],
    'webmaster' => [
        'type' => 1,
        'description' => 'Вебмастер',
        'ruleName' => 'userRole',
        'children' => [
            'dashboard',
        ],
    ],
    'advertiser' => [
        'type' => 1,
        'description' => 'Рекламодатель',
        'ruleName' => 'userRole',
        'children' => [
            'webmaster',
            'advertboard',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'Администратор',
        'ruleName' => 'userRole',
        'children' => [
            'advertiser',
            'adminka',
        ],
    ],
];
