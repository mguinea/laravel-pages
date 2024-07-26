<?php

return [
    'models' => [
        'locale' => \Mguinea\Pages\Models\Locale::class,
        'page' => \Mguinea\Pages\Models\Page::class,
        'translation' => \Mguinea\Pages\Models\Translation::class,
        'user' => \App\Models\User::class,
    ],

    'route' => \Mguinea\Pages\Route::class,

    'table_names' => [
        'locales' => 'lps_locales',
        'pages' => 'lps_pages',
        'translatables' => 'lps_translatables',
        'translations' => 'lps_translations',
        'users' => 'users',
    ],

    'column_names' => [
        'model_morph_key' => 'model_id',
    ],

    'route_loader_enabled' => true,

    'backoffice_prefix' => 'backoffice',

    'register_enabled' => true
];
