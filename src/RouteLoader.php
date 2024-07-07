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
        return $this->route->all();
    }
}
