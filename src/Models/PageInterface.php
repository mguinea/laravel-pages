<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface PageInterface
{
    public function locale(): BelongsTo;

    public function entry(): BelongsTo;

    public function view(): BelongsTo;

    public static function fromUrl(string $url): static|null;
}
