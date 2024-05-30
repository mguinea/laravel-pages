<?php

namespace Mguinea\LaravelPages\Group;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model implements GroupInterface
{

    public function pages(): BelongsToMany
    {
    }
}
