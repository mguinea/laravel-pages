<?php

namespace Mguinea\LaravelPages\View;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mguinea\LaravelPages\Page\PageInterface;

class View extends Model implements ViewInterface
{
    public $timestamps = false;

    protected $fillable = ['name'];

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('laravel-pages.table_names.views'));
    }

    public static function findByName(string $name = null): ViewInterface
    {
        return static::where('name', $name)->firstOrFail();
    }

    public function pages(): HasMany
    {
        // TODO: Implement taxonomies() method.
    }
}
