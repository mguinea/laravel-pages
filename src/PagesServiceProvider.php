<?php

namespace Mguinea\LaravelPages;

use Illuminate\Filesystem\Filesystem;
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
    public function boot(Filesystem $filesystem)
    {
        $this->publishes([
            __DIR__.'/../config/laravel-pages.php' => config_path('laravel-pages.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/create_laravel_pages_tables.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ]);

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/mguinea/laravel-pages'),
        ], 'views');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-pages');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->app->bind(PageInterface::class, fn ($app) => $app->make($app->config['laravel-pages.models.page']));
        $this->app->bind(ViewInterface::class, fn ($app) => $app->make($app->config['laravel-pages.models.view']));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-pages.php',
            'laravel-pages'
        );
    }
}
