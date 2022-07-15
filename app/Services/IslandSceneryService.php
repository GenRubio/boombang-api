<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\IslandScenery;
use App\Repositories\IslandScenery\IslandSceneryRepository;
/**
 * Class IslandSceneryService
 * @package App\Services\IslandScenery
 */
class IslandSceneryService extends Controller
{
    /**
     * IslandSceneryService constructor.
     * @param IslandScenery $islandscenery
     */
    public function __construct()
    {
        $this->IslandSceneryRepository = new IslandSceneryRepository();
    }

}
