<?php

namespace App\Repositories\HomeScenery;

use App\Models\HomeScenery;
use App\Repositories\Repository;


/**
 * Class HomeSceneryRepository
 * @package App\Repositories\HomeScenery
 */
class HomeSceneryRepository extends Repository implements HomeSceneryRepositoryInterface
{
    /**
     * @var homeScenery
     */
    protected $model;

    /**
     * HomeSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new HomeScenery();
        parent::__construct($this->model);
    }
}
