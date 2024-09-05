<?php

namespace App\Tools;

class StringTools
{
    public static function toCamelCase($value, $pascaleCase = null): string
    {
        $value = ucwords(str_replace(array('-', '_'), ' ', $value));
        $value = str_replace(' ', '', $value);
        if($pascaleCase === false){
            return lcfirst($value);
        } else {
            return $value;
        }
    }

    public static function toPascaleCase($value): string
    {
        return self::toCamelCase($value, true);
    }

   
}