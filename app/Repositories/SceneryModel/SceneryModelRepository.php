<?php

namespace App\Repositories\SceneryModel;

use App\Models\SceneryModel;
use App\Repositories\Repository;


/**
 * Class SceneryModelRepository
 * @package App\Repositories\SceneryModel
 */
class SceneryModelRepository extends Repository implements SceneryModelRepositoryInterface
{
    /**
     * @var sceneryModel
     */
    protected $model;

    /**
     * SceneryModelRepository constructor.
     */
    public function __construct()
    {
        $this->model = new SceneryModel();
        parent::__construct($this->model);
    }
}
