<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Route extends Model implements RouteInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'verb',
        'uri',
        'action'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('laravel-pages.table_names.routes') ?: parent::getTable();
    }

    public function page(): HasOne
    {
        return $this->hasOne(Page::class);
    }

    public function getName(): string|null
    {

    }

    public function getVerb(): string
    {

    }

    public function getUri(): string
    {

    }

    public function getAction(): string
    {

    }
}
