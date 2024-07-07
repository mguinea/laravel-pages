<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

interface EntryInterface
{
    public function pages(): HasMany;
}
