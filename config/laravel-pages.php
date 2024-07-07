<?php

return [
    'models' => [
        'entry' => \Mguinea\Pages\Models\Entry::class,
        'locale' => \Mguinea\Pages\Models\Locale::class,
        'page' => \Mguinea\Pages\Models\Page::class,
        'route' => \Mguinea\Pages\Models\Route::class,
        'user' => \App\Models\User::class,
        'view' => \Mguinea\Pages\Models\View::class,
    ],

    'table_names' => [
        'entries' => 'lp_entries',
        'locales' => 'lp_locales',
        'pages' => 'lp_pages',
        'routes' => 'lp_routes',
        'users' => 'users',
        'views' => 'lp_views',
    ],

    'route_loader' => \Mguinea\Pages\RouteLoader::class,

    'route_loader_enabled' => true,

    'base_url' => env('APP_URL', 'http://localhost:8000/'),

    'controllers' => [
        'show_page' => \Mguinea\Pages\Http\Controllers\ShowPageController::class
    ]
];
