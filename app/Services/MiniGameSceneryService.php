<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\MiniGameScenery;
use App\Repositories\MiniGameScenery\MiniGameSceneryRepository;
/**
 * Class MiniGameSceneryService
 * @package App\Services\MiniGameScenery
 */
class MiniGameSceneryService extends Controller
{
    /**
     * MiniGameSceneryService constructor.
     * @param MiniGameScenery $minigamescenery
     */
    public function __construct()
    {
        $this->MiniGameSceneryRepository = new MiniGameSceneryRepository();
    }

}
