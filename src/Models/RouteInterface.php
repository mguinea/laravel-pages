<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

interface RouteInterface
{
    public function page(): HasOne;

    public function getName(): string|null;

    public function getVerb(): string;

    public function getUri(): string;

    public function getAction(): string;
}
