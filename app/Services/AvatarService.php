<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use App\Repositories\Avatar\AvatarRepository;
/**
 * Class AvatarService
 * @package App\Services\Avatar
 */
class AvatarService extends Controller
{
    /**
     * AvatarService constructor.
     * @param Avatar $avatar
     */
    public function __construct()
    {
        $this->AvatarRepository = new AvatarRepository();
    }

}
