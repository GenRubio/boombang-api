<?php

namespace App\Helpers;

use App\Models\Message;
use App\Models\Page;
use App\Models\PresetEmail;
use App\Models\Rgpd;
use App\Models\User;
use App\Services\MessageService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Exception;

class UtilsHelper
{
    public static function refactorBitMap($map)
    {
        $refactor = str_replace(' ', '', $map);
        return str_replace("\n", "\r\n", $refactor);
    }
}
