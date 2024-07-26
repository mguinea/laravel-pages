<?php

if (! function_exists('globals')) {
    /**
     * @return string
     */
    function globals(string $key = "", ?string $lang = null)
    {
        if (is_null($lang)) {
            $lang = app()->getLocale();
        }

        return __('globals' . '.' . $key, [], $lang);
    }
}
