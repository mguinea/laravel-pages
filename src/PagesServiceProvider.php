<?php

namespace Mguinea\Pages;

use Illuminate\Support\ServiceProvider;
use Mguinea\Pages\Models\PageInterface;
use Mguinea\Pages\Models\RouteInterface;
use Mguinea\Pages\Models\ViewInterface;
use Mguinea\Pages\RouteLoaderInterface;

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
            __DIR__.'/../config/laravel-pages.php' => config_path('laravel-pages.php'),
        ], 'config');

        $this->publishesMigrations([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ]);

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/mguinea/laravel-pages'),
        ], 'views');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-pages');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PageInterface::class, fn ($app) => $app->make($app->config['laravel-pages.models.page']));
        $this->app->bind(RouteInterface::class, fn ($app) => $app->make($app->config['laravel-pages.models.route']));
        $this->app->bind(ViewInterface::class, fn ($app) => $app->make($app->config['laravel-pages.models.view']));
        $this->app->bind(RouteLoaderInterface::class, function ($app) {
            return new RouteLoader($app->make(RouteInterface::class));
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-pages.php',
            'laravel-pages'
        );
    }
}
