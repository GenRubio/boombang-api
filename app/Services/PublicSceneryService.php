<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\PublicScenery;
use App\Repositories\PublicScenery\PublicSceneryRepository;
/**
 * Class PublicSceneryService
 * @package App\Services\PublicScenery
 */
class PublicSceneryService extends Controller
{
    /**
     * PublicSceneryService constructor.
     * @param PublicScenery $publicscenery
     */
    public function __construct()
    {
        $this->PublicSceneryRepository = new PublicSceneryRepository();
    }

}
