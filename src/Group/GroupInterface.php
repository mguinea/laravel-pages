<?php

namespace Mguinea\LaravelPages\Group;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface GroupInterface
{
    public function pages(): BelongsToMany;
}
