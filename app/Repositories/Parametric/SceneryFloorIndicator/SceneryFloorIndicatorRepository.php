<?php

namespace App\Repositories\Parametric\SceneryFloorIndicator;

use App\Models\Parametric\SceneryFloorIndicator;
use App\Repositories\Repository;


/**
 * Class SceneryFloorIndicatorRepository
 * @package App\Repositories\SceneryFloorIndicator
 */
class SceneryFloorIndicatorRepository extends Repository implements SceneryFloorIndicatorRepositoryInterface
{
    /**
     * @var SceneryFloorIndicator
     */
    protected $model;

    /**
     * SceneryFloorIndicatorRepository constructor.
     */
    public function __construct()
    {
        $this->model = new SceneryFloorIndicator();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
