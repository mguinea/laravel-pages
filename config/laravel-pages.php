<?php

return [
    'models' => [
        'entry' => \Mguinea\Pages\Models\Entry::class,
        'locale' => \Mguinea\Pages\Models\Locale::class,
        'page' => \Mguinea\Pages\Models\Page::class,
        'view' => \Mguinea\Pages\Models\View::class,
    ],

    'table_names' => [
        'entries' => 'lp_entries',
        'locales' => 'lp_locales',
        'pages' => 'lp_pages',
        'views' => 'lp_views',
    ],

    'route_loader' => \Mguinea\Pages\PageRouteLoader::class,

    'route_loader_enabled' => true,

    'base_url' => env('APP_URL', 'http://localhost:8000/'),

    'controllers' => [
        'show_page' => \Mguinea\Pages\Http\Controllers\ShowPageController::class
    ]
];
