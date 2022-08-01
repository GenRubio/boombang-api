<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\Avatar;
use App\Repositories\Parametric\Avatar\AvatarRepository;

/**
 * Class AvatarService
 * @package App\Services\Avatar
 */
class AvatarService extends Controller
{
    /**
     * AvatarService constructor.
     * @param Avatar $Avatar
     */
    public function __construct()
    {
        $this->avatarRepository = new AvatarRepository();
    }

    public function getAll()
    {
        return $this->avatarRepository->getAll();
    }
}
