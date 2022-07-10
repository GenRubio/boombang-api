<?php

namespace App\Repositories\GamesScenery;

use App\Models\GamesScenery;
use App\Repositories\Repository;


/**
 * Class GamesSceneryRepository
 * @package App\Repositories\GamesScenery
 */
class GamesSceneryRepository extends Repository implements GamesSceneryRepositoryInterface
{
    /**
     * @var gamesScenery
     */
    protected $model;

    /**
     * GamesSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new GamesScenery();
        parent::__construct($this->model);
    }
}
