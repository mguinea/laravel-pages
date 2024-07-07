<?php

if (config('laravel-pages.route_loader_enabled') === true) {
    $routesLoader = app()->make(\Mguinea\LaravelPages\RouteLoaderInterface::class);
    $routes = $routesLoader->load();
    $router = app()->get(\Illuminate\Routing\Router::class);

    foreach ($routes as $route) {
        $router->addRoute(
            'GET',
            $route,
            \App\Http\Controllers\ShowPageController::class
        );
    }
}
