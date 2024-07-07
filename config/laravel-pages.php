<?php

return [
    'models' => [
        'page' => Mguinea\LaravelPages\Page\Page::class,
        'uri' => Mguinea\LaravelPages\Uri\Uri::class,
        'view' => Mguinea\LaravelPages\View\View::class,
    ],

    'table_names' => [
        'pages' => 'lp_pages',
        'uris' => 'lp_uris',
        'views' => 'lp_views',
    ],

    'route_loader' => \Mguinea\Pages\PageRouteLoader::class,

    'route_loader_enabled' => true
];
