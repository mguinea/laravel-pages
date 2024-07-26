<?php

namespace Mguinea\Pages\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mguinea\Pages\Traits\Attributable;

class Page extends Model implements PageInterface
{
    use Attributable;
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'published_at',
        'author',
        'robot_index',
        'robot_follow',
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

        $this->table = config('pages.table_names.pages') ?: parent::getTable();
    }

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime:Y-m-d',
            'draft' => 'boolean'
        ];
    }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => strtolower($value), // TODO, common mark parser
            set: fn (string $value) => strtolower($value)
        );
    }

    public function locale(): BelongsTo
    {
        return $this->belongsTo(config('laravel-pages.models.locale'));
    }

    public function scopePublished(Builder $query): void
    {
        $query->where('published_at', '>=', Carbon::today())->where('draft', false);
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
