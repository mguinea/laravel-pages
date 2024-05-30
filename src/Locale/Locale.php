<?php

namespace Mguinea\LaravelPages\Locale;

use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    protected $fillable = ['name', 'language', 'localisation']; // British English, en, GB -> en-GB

    protected $guarded = ['id'];

    public function hreflang(): string
    {

    }
}
