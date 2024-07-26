<?php

namespace Mguinea\Pages\Traits;

use Illuminate\Support\Arr;


trait Attributable
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->casts['custom_attributes'] = 'array';
    }

    public function forgetCustomAttribute(string $name): self
    {
        $customAttributes = $this->custom_attributes;
        Arr::forget($customAttributes, $name);
        $this->custom_attributes = $customAttributes;

        return $this;
    }

    /**
     * Get the value of custom attribute with the given name.
     *
     * @param string $attributeName
     * @param mixed $default
     *
     * @return mixed
     */
    public function getCustomAttribute(string $attributeName, $default = null)
    {
        return Arr::get($this->custom_attributes, $attributeName, $default);
    }

    /*
     * Determine if the model item has a custom attribute with the given name.
     */
    public function hasCustomAttribute(string $attributeName): bool
    {
        return Arr::has($this->custom_attributes, $attributeName);
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @return $this
     */
    public function setCustomAttribute(string $name, $value): self
    {
        $customAttributes = $this->custom_attributes;
        Arr::set($customAttributes, $name, $value);
        $this->custom_attributes = $customAttributes;

        return $this;
    }
}
