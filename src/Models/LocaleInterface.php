<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface LocaleInterface
{
    public function pages(): HasMany;
}
