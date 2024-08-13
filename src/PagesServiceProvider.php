<?php

namespace Mguinea\Pages;

use Illuminate\Support\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
        ]);

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'pages-migrations');

        /**
         * Override configurations from Route Loader package
         */
        config([
            'route-loader' => config('pages.route_loader'),
        ]);

        /**
         * Override configurations from Tanslatable package
         */
        config([
            'translatable' => config('pages.translatable'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(PageInterface::class, fn ($app) => $app->make($app->config['pages.models.page']));

        $this->mergeConfigFrom(
            __DIR__.'/../config/pages.php',
            'pages'
        );
    }
}
