<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\PrivateScenery;
use App\Repositories\PrivateScenery\PrivateSceneryRepository;

/**
 * Class PrivateSceneryService
 * @package App\Services\PrivateScenery
 */
class PrivateSceneryService extends Controller
{
    /**
     * PrivateSceneryService constructor.
     * @param PrivateScenery $PrivateScenery
     */
    public function __construct()
    {
        $this->privateSceneryRepository = new PrivateSceneryRepository();
    }

    public function getAll()
    {
        return $this->privateSceneryRepository->getAll();
    }
}
