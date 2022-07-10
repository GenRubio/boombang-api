<?php

use App\Helpers\AuthHelper;
use App\Helpers\CrudHelper;
use App\Helpers\UtilsHelper;

/**
 * AuthHelper
 */

if (!function_exists('isAdmin')) {
    function isAdmin($user = null)
    {
        return AuthHelper::isAdmin($user);
    }
}

if (!function_exists('isSuperAdmin')) {
    function isSuperAdmin($user = null)
    {
        return AuthHelper::isSuperAdmin($user);
    }
}

if (!function_exists('isAdminOrSuperadmin')) {
    function isAdminOrSuperadmin($user = null)
    {
        return AuthHelper::isAdminOrSuperadmin($user);
    }
}

if (!function_exists('userIsActive')) {
    function userIsActive($user)
    {
        return AuthHelper::userIsActive($user);
    }
}

if (!function_exists('getUser')) {
    function getUser()
    {
        return AuthHelper::getUser();
    }
}


/**
 * UtilsHelper
 */

if (!function_exists('refactorBitMap')) {
    function refactorBitMap($map)
    {
        return UtilsHelper::refactorBitMap($map);
    }
}

/**
 * CrudHelper
 */


if (!function_exists('toggleField')) {
    function toggleField($request)
    {
        return CrudHelper::toggleField($request);
    }
}