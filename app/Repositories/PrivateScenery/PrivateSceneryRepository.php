<?php

namespace App\Repositories\PrivateScenery;

use App\Models\PrivateScenery;
use App\Repositories\Repository;


/**
 * Class PrivateSceneryRepository
 * @package App\Repositories\PrivateScenery
 */
class PrivateSceneryRepository extends Repository implements PrivateSceneryRepositoryInterface
{
    /**
     * @var PrivateScenery
     */
    protected $model;

    /**
     * PrivateSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new PrivateScenery();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->active()->get();
    }
}
