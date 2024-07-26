<?php

namespace Mguinea\Pages\Events;

use Illuminate\Database\Eloquent\Model;

class TranslationSet
{
    public $model;
    public $field;
    public $locale;
    public $oldValue;
    public $newValue;

    public function __construct(Model $model, string $field, string $locale, $oldValue, $newValue)
    {
        $this->model = $model;
        $this->field = $field;
        $this->locale = $locale;
        $this->oldValue = $oldValue;
        $this->newValue = $newValue;
    }
}
