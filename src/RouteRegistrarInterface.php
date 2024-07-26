<?php

namespace Mguinea\Pages;

use Illuminate\Support\Collection;

interface RouteRegistrarInterface
{
    public function registerRoutes(Collection $pendingRoutes): void;
}
