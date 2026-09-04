<?php

namespace App\Compat;

class JsValidator
{
    /**
     * Return an empty string for formRequest JS validation when the original
     * package is not installed. This preserves view rendering during upgrade.
     */
    public static function formRequest($requestClass, $selector = '#form')
    {
        return '';
    }
}
