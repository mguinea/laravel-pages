<?php

namespace Mguinea\Pages;

use Illuminate\Support\Collection;
use Mguinea\Pages\Models\RouteInterface;

class RouteLoader implements RouteLoaderInterface
{
    public function __construct(protected RouteInterface $route)
    {
    }

    public function load(): Collection
    {
        // TODO implement cache
        $routes = $this->route->all();

        return collect($routes->toArray());
    }
}
