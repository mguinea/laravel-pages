<?php

namespace Mguinea\Pages;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Mguinea\Pages\Models\LocaleInterface;
use Mguinea\Pages\Models\PageInterface;
use TranslationInterface;

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
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        /**
         * Load and register routes. TODO move to specific class for this
         */
        if (config('pages.route_loader_enabled') === true) {
            if (Schema::hasTable(config('pages.table_names.pages'))) {
                $pageModel = config('pages.models.page');
                $routeCollection = new RouteCollection($pageModel::wherePublished()->get()->map(function($page) {
                    return new Route($page->uri);
                }));

                (new RouteRegistrar(app()->get(\Illuminate\Routing\Router::class)))->registerRoutes($routeCollection);
            }
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LocaleInterface::class, fn ($app) => $app->make($app->config['pages.models.locale']));
        $this->app->bind(PageInterface::class, fn ($app) => $app->make($app->config['pages.models.page']));
        $this->app->bind(TranslationInterface::class, fn ($app) => $app->make($app->config['pages.models.translation']));

        $this->mergeConfigFrom(
            __DIR__.'/../config/pages.php',
            'pages'
        );
    }
}
