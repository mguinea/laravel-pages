<?php

namespace Mguinea\LaravelPages\Page;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mguinea\LaravelPages\View\View;

class Page extends Model implements PageInterface
{
    protected $fillable = [];

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('laravel-pages.table_names.pages'));
    }

    public static function findByUri(string $uri = null): PageInterface
    {
        if (null === $uri) {
            $uri = '/';
        }

        return static::where('uri', $uri)->firstOrFail();
    }

    public static function findById(string $id): PageInterface
    {
        return static::where('uri', $id)->firstOrFail();
    }

    public function groups(): BelongsToMany
    {
        // TODO: Implement groups() method.
    }

    public function taxonomies(): BelongsToMany
    {
        // TODO: Implement taxonomies() method.
    }

    public function uris(): HasMany
    {

    }

    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }
}
