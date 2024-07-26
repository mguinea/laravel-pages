<?php

namespace Mguinea\Pages;

use Illuminate\Support\Collection;
use Illuminate\Routing\Router;

class RouteRegistrar implements RouteRegistrarInterface
{
    public function __construct(protected Router $router)
    {
    }

    public function registerRoutes(Collection $pendingRoutes): void
    {
        $pendingRoutes->each(function (Route $pendingRoute) {
            $pendingRoute->actions->each(function (PendingRouteAction $action) {
                $route = $this->router->addRoute($action->methods, $action->uri, $action->action());

                $route->middleware($action->middleware);

                $route->name($action->name);

                if (count($action->wheres)) {
                    $route->setWheres($action->wheres);
                }

                if ($action->domain) {
                    $route->domain($action->domain);
                }
            });
        });
    }

    use Illuminate\Support\Facades\Schema;

    if (config('pages.route_loader_enabled') === true) {
        if (Schema::hasTable('lp_routes')) {
            $routesLoader = app()->make(\Mguinea\Pages\RouteLoaderInterface::class);
            $showPageController = app()->make(\Mguinea\Pages\Http\Controllers\ShowPageControllerInterface::class);
            $router = app()->get(\Illuminate\Routing\Router::class);

            $routes = $routesLoader->load();

            /** @var \Mguinea\Pages\Models\RouteInterface $route */
            foreach ($routes as $route) {
                $laravelRoute = $router->addRoute(
                    $route->verb,
                    $route->uri,
                    $route->action
                );
                $laravelRoute->name($route->name);
                $laravelRoute->middleware(['web']); // TODO move to migration
            }
        }
    }
}
