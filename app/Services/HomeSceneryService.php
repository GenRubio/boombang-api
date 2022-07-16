<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\HomeScenery;
use App\Repositories\HomeScenery\HomeSceneryRepository;
/**
 * Class HomeSceneryService
 * @package App\Services\HomeScenery
 */
class HomeSceneryService extends Controller
{
    /**
     * HomeSceneryService constructor.
     * @param HomeScenery $homescenery
     */
    public function __construct()
    {
        $this->HomeSceneryRepository = new HomeSceneryRepository();
    }

}
