<?php

use Illuminate\Support\Facades\Schema;

if (config('laravel-pages.route_loader_enabled') === true) {
    if (Schema::hasTable('lp_routes')) {
        $routesLoader = app()->make(\Mguinea\Pages\RouteLoaderInterface::class);
        $showPageController = app()->make(\Mguinea\Pages\Http\Controllers\ShowPageControllerInterface::class);
        $router = app()->get(\Illuminate\Routing\Router::class);

        $routes = $routesLoader->load();

        /** @var \Mguinea\Pages\Models\RouteInterface $route */
        foreach ($routes as $route) {
            $laravelRoute = $router->addRoute(
                $route->getVerb(),
                $route->getUri(),
                $route->getAction()
            );
            $laravelRoute->name($route->getName());
        }
    }
}
