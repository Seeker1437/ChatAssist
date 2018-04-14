<?php

/**
 * Created by PhpStorm.
 * User: Darnell
 * Date: 6/19/2016
 * Time: 10:14 AM
 */
class StringUtil
{
    public static function isNullOrEmpty($question){
        return (!isset($question) || trim($question)==='');
    }

    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}