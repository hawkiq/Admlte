<?php

if (! function_exists('admlte_translate')) {
    function admlte_translate($key)
    {
        $translator = app('translator');

        if ($translator->has('admlte::' . $key)) {
            return __($key);
        }

        if ($translator->has('admlte::main.' . $key)) {
            return __('admlte::main.' . $key);
        }

        return ucfirst(str_replace('_', ' ', $key));
    }
}