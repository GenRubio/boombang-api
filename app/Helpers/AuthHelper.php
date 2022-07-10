<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    static function isAdmin($user = null)
    {
        $user = $user ?? backpack_user();
        return ($user->hasRole('Admin') ? true : false);
    }

    static function isSuperAdmin($user = null)
    {
        $user = $user ?? backpack_user();
        return ($user->hasRole('Superadmin') ? true : false);
    }

    static function isAdminOrSuperadmin($user = null)
    {
        $user = $user ?? backpack_user();
        return ($user->hasRole('Superadmin') || $user->hasRole('Admin') ? true : false);
    }

    static function userIsActive($user)
    {
        return $user->active;
    }

    static function getUser()
    {
        return Auth::user();
    }
}