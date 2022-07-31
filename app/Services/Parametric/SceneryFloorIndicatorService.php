<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\SceneryFloorIndicator;
use App\Repositories\Parametric\SceneryFloorIndicator\SceneryFloorIndicatorRepository;

/**
 * Class SceneryFloorIndicatorService
 * @package App\Services\SceneryFloorIndicator
 */
class SceneryFloorIndicatorService extends Controller
{
    /**
     * SceneryFloorIndicatorService constructor.
     * @param SceneryFloorIndicator $SceneryFloorIndicator
     */
    public function __construct()
    {
        $this->sceneryFloorIndicatorRepository = new SceneryFloorIndicatorRepository();
    }

    public function getAll()
    {
        return $this->sceneryFloorIndicatorRepository->getAll();
    }
}
