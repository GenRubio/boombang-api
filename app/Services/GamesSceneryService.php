<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\GamesScenery;
use App\Repositories\GamesScenery\GamesSceneryRepository;
/**
 * Class GamesSceneryService
 * @package App\Services\GamesScenery
 */
class GamesSceneryService extends Controller
{
    /**
     * GamesSceneryService constructor.
     * @param GamesScenery $gamesscenery
     */
    public function __construct()
    {
        $this->GamesSceneryRepository = new GamesSceneryRepository();
    }

}
