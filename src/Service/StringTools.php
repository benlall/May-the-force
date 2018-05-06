<?php

namespace Service;

/**
 *  class StringTools
 */
class StringTools
{

    public static
    function trimWhiteSpaces(string $str): string
    {
        for ($i = 0; $i < strlen($str); $i++) {
            if ($str[$i] !== ' ') {
                $str = substr($str, $i);
                return $str;
            }
        }
        return $str;
    }
}
