<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

interface PageInterface
{
    public function locale(): BelongsTo;

    public function entry(): BelongsTo;

    public function view(): BelongsTo;

    public function route(): HasOne;

    public static function fromUrl(string $url): static|null;
}
