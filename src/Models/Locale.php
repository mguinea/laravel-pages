<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locale extends Model implements LocaleInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'language',
        'localization',
        'default'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-pages.table_names.locales') ?: parent::getTable();
    }

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    public function getHrefLang(): string
    {
        return strtolower($this->attributes['language']) . '-' . strtoupper($this->attributes['localization']);
    }
}
