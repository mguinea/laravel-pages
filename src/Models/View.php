<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class View extends Model implements ViewInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-pages.table_names.views') ?: parent::getTable();
    }

    public function pages(): HasMany
    {
        return $this->hasMany(config('laravel-pages.models.page'));
    }
}
