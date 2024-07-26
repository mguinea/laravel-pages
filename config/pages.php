<?php

return [
    'models' => [
        'locale' => \Mguinea\Pages\Models\Locale::class,
        'page' => \Mguinea\Pages\Models\Page::class,
        'user' => \App\Models\User::class,
    ],

    'route' => \Mguinea\Pages\Route::class,

    'table_names' => [
        'locales' => 'lps_locales',
        'pages' => 'lps_pages',
        'users' => 'users',
    ],

    'route_loader_enabled' => true,

    'models' => [
        'translation' => LaTevaWeb\Translatable\Models\Translation::class,
    ],

    'table_names' => [
        'translatables' => 'latevaweb_translatables',
        'translations' => 'latevaweb_translations',
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],
];
