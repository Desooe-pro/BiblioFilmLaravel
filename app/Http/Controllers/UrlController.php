<?php

namespace App\Http\Controllers;

class UrlController
{
    public static function traiteBackSorted(string $back)
    {
        $back = explode("/", $back);
        return ["type" => $back[5], "order" => $back[6]];
    }

    public static function traiteBackFiltered(string $back)
    {
        return explode("/", $back)[5];
    }
}
