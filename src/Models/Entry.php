<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Entry extends Model implements EntryInterface
{
    use HasFactory;

    protected $fillable = [
        'key'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-pages.table_names.entries') ?: parent::getTable();
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
