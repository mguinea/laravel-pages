<?php

namespace Mguinea\LaravelPages\Uri;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Mguinea\LaravelPages\Page\Page;

class Uri extends Model implements UriInterface
{
    protected $fillable = ['value'];

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('laravel-pages.table_names.uris'));
    }

    public function localisation(): BelongsTo
    {

    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
