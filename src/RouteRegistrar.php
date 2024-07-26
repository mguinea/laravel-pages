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
}
