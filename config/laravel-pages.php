<?php

return [
    'models' => [
        'locale' => \Mguinea\Pages\Models\Locale::class,
        'page' => \Mguinea\Pages\Models\Page::class,
        'user' => \App\Models\User::class,
    ],

    'table_names' => [
        'locales' => 'lps_locales',
        'pages' => 'lps_pages',
        'users' => 'users',
    ],

    'route_loader_enabled' => true,
];
