<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Page extends Model implements PageInterface
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'published_at',
        'author',
        'robotIndex',
        'robotFollow',
        'canonical',
        'content',
        'route_id',
        'user_id',
        'entry_id',
        'locale_id',
        'view_id'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-pages.table_names.pages') ?: parent::getTable();
    }

    public function locale(): BelongsTo
    {
        return $this->belongsTo(Locale::class);
    }

    public function entry(): BelongsTo
    {
        return $this->belongsTo(Entry::class);
    }

    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }

    public function route(): HasOne
    {
        return $this->hasOne(Route::class);
    }

    public static function fromUrl(string $url): static|null
    {
        $page = static::where('url', $url)->first();

        if (!$page) {
            return null;
        }

        return $page;
    }
}
