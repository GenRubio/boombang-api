<?php

namespace App\Repositories\Parametric\SceneryType;

use App\Models\Parametric\SceneryType;
use App\Repositories\Repository;


/**
 * Class SceneryTypeRepository
 * @package App\Repositories\SceneryType
 */
class SceneryTypeRepository extends Repository implements SceneryTypeRepositoryInterface
{
    /**
     * @var SceneryType
     */
    protected $model;

    /**
     * SceneryTypeRepository constructor.
     */
    public function __construct()
    {
        $this->model = new SceneryType();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
