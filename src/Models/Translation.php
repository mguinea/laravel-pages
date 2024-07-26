<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $casts = [
        'content' => 'array',
    ];
    protected $fillable = ['content', 'field', 'locale'];
    protected $guarded = ['id'];
    public $timestamps = false;

    /**
     * Override default constructor to set table using config file.
     * @param array $attributes [fields]
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('pages.table_names.translations') ?: parent::getTable();
    }
}
