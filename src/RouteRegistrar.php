<?php

namespace Mguinea\Pages;

use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Router;

class RouteRegistrar implements RouteRegistrarInterface
{
    public function __construct(protected Router $router)
    {
    }

    public function registerRoutes(Collection $pendingRoutes): void
    {
        $pendingRoutes->each(function (Route $pendingRoute) {
            try {
                $route = $this->router->addRoute($pendingRoute->methods(), $pendingRoute->uri(), $pendingRoute->action());

                $route->middleware($pendingRoute->middlewares());

                $route->name($pendingRoute->name());

                if (count($pendingRoute->wheres())) {
                    $route->setWheres($pendingRoute->wheres());
                }

                if ($pendingRoute->domain()) {
                    $route->domain($pendingRoute->domain());
                }
            } catch (Exception $e) {
                Log::error('[RouteRegistrar] ' . $e->getMessage());
            }
        });
    }
}
