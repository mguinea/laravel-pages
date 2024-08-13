<?php

return [
    'models' => [
        'page' => \Mguinea\Pages\Models\Page::class
    ],

    'table_names' => [
        'pages' => 'lp_pages',
    ],

    /**
     * Route loader package configuration overrides
     */
    'route_loader' => [
        'enabled' => env('ROUTE_LOADER_ENABLED', true),

        'loader' => \Mguinea\Pages\EloquentRouteLoader::class,
    ],

    /**
     * Translatable package configuration overrides
     */
    'translatable' => [
        'models' => [
            'translation' => Mguinea\Translatable\Models\Translation::class,
        ],

        'table_names' => [
            'translatables' => 'translatables',
            'translations' => 'translations',
        ],

        'column_names' => [
            'model_morph_key' => 'model_id',
        ],

        'locales' => [
            'en',
            'es'
        ]
    ]
];
