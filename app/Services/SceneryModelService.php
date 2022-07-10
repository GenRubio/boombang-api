<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\SceneryModel;
use App\Repositories\SceneryModel\SceneryModelRepository;
/**
 * Class SceneryModelService
 * @package App\Services\SceneryModel
 */
class SceneryModelService extends Controller
{
    /**
     * SceneryModelService constructor.
     * @param SceneryModel $scenerymodel
     */
    public function __construct()
    {
        $this->SceneryModelRepository = new SceneryModelRepository();
    }

}
