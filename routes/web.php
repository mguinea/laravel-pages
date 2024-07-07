<?php

if (config('laravel-pages.route_loader_enabled') === true) {
    $routesLoader = app()->make(\Mguinea\Pages\RouteLoaderInterface::class);
    $showPageController = app()->make(\Mguinea\Pages\Http\Controllers\ShowPageControllerInterface::class);
    $router = app()->get(\Illuminate\Routing\Router::class);

    $routes = $routesLoader->load();
    foreach ($routes as $route) {
        $router->addRoute(
            'GET',
            $route,
            $showPageController
        );
    }
}
