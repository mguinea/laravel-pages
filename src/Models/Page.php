<?php

namespace Mguinea\Pages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mguinea\Translatable\Traits\Translatable;

class Page extends Model implements PageInterface
{
    use HasFactory;
    use Translatable;

    public static $translatable = [
        'title',
        'description',
        'h1',
        'content',
        'uri',
        'draft',
        'published_at',
        'robot_index',
        'robot_follow',
        'template',
        'action'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('pages.table_names.pages') ?: parent::getTable();
    }
}
