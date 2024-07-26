<?php

return [
    'models' => [
        'page' => \Mguinea\Pages\Models\Page::class,
        'translation' => \Mguinea\Pages\Models\Translation::class,
        'user' => \Mguinea\Pages\Models\User::class,
    ],

    'route' => \Mguinea\Pages\Route::class,

    'table_names' => [
        'pages' => 'lps_pages',
        'translatables' => 'lps_translatables',
        'translations' => 'lps_translations',
        'users' => 'lps_users',
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],

    'route_loader_enabled' => true,

    'backoffice_prefix' => 'backoffice',

    'register_enabled' => false,

    'locales' => [
        'es',
        'ca'
    ]
];
