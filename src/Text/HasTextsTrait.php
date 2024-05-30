<?php

namespace Mguinea\LaravelPages\Text;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasTextsTrait
{
    /**
     * A model has many texts
     *
     * @return BelongsToMany
     */
    public function texts(): BelongsToMany
    {
        $relation = $this->morphToMany(
            config('permission.models.role'),
            'model',
            config('permission.table_names.model_has_roles'),
            config('permission.column_names.model_morph_key'),
            app(PermissionRegistrar::class)->pivotRole
        );

        if (!app(PermissionRegistrar::class)->teams) {
            return $relation;
        }

        $teamField = config('permission.table_names.roles').'.'.app(PermissionRegistrar::class)->teamsKey;

        return $relation->wherePivot(app(PermissionRegistrar::class)->teamsKey, getPermissionsTeamId())
            ->where(fn ($q) => $q->whereNull($teamField)->orWhere($teamField, getPermissionsTeamId()));
    }

    public function assignText(...$texts): void
    {

    }

    public function removeText($text): void
    {

    }
}
