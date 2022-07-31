<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\SceneryType;
use App\Repositories\Parametric\SceneryType\SceneryTypeRepository;

/**
 * Class SceneryTypeService
 * @package App\Services\SceneryType
 */
class SceneryTypeService extends Controller
{
    /**
     * SceneryTypeService constructor.
     * @param SceneryType $SceneryType
     */
    public function __construct()
    {
        $this->sceneryTypeRepository = new SceneryTypeRepository();
    }

    public function getAll()
    {
        return $this->sceneryTypeRepository->getAll();
    }
}
