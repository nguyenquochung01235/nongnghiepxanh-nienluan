<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Helper
{
    public static function idAdmin()
    {
        $id = Auth::user()->admin_id;
        return $id;
    }
    public static function nameAdmin()
    {
        $name = Auth::user()->admin_name;
        return $name;
    }
    public static function avatarAdmin()
    {
        $avatar= Auth::user()->admin_avatar;
        return $avatar;
    }
}