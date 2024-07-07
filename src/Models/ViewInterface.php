<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface ViewInterface
{
    public function pages(): HasMany;
}
