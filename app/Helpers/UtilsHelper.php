<?php

namespace App\Helpers;

class UtilsHelper
{
    public static function refactorBitMap($map)
    {
        $refactor = str_replace(' ', '', $map);
        return str_replace("\n", "\r\n", $refactor);
    }
}
