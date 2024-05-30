<?php

namespace Mguinea\LaravelPages\Page;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface PageInterface
{
    public static function findByUri(string $uri = null): PageInterface;

    public static function findById(string $id): PageInterface;

    public function taxonomies(): BelongsToMany;

    public function groups(): BelongsToMany;
}
