<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\GameScenery;
use App\Repositories\GameScenery\GameSceneryRepository;
/**
 * Class GameSceneryService
 * @package App\Services\GameScenery
 */
class GameSceneryService extends Controller
{
    /**
     * GameSceneryService constructor.
     * @param GameScenery $gamescenery
     */
    public function __construct()
    {
        $this->GameSceneryRepository = new GameSceneryRepository();
    }

}
