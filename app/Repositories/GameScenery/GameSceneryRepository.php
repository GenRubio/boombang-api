<?php

namespace App\Repositories\GameScenery;

use App\Models\GameScenery;
use App\Repositories\Repository;


/**
 * Class GameSceneryRepository
 * @package App\Repositories\GameScenery
 */
class GameSceneryRepository extends Repository implements GameSceneryRepositoryInterface
{
    /**
     * @var gameScenery
     */
    protected $model;

    /**
     * GameSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new GameScenery();
        parent::__construct($this->model);
    }
}
