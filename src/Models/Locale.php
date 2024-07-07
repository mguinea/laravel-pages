<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locale extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'language',
        'localization',
        'default'
    ];

    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
