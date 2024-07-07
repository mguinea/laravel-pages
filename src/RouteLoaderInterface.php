<?php

namespace Mguinea\Pages;

use Illuminate\Support\Collection;

interface RouteLoaderInterface
{
    public function load(): Collection;
}
