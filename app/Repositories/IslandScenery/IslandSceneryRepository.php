<?php

namespace App\Repositories\IslandScenery;

use App\Models\IslandScenery;
use App\Repositories\Repository;


/**
 * Class IslandSceneryRepository
 * @package App\Repositories\IslandScenery
 */
class IslandSceneryRepository extends Repository implements IslandSceneryRepositoryInterface
{
    /**
     * @var islandScenery
     */
    protected $model;

    /**
     * IslandSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new IslandScenery();
        parent::__construct($this->model);
    }
}
