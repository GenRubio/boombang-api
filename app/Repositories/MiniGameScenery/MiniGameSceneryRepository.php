<?php

namespace App\Repositories\MiniGameScenery;

use App\Models\MiniGameScenery;
use App\Repositories\Repository;


/**
 * Class MiniGameSceneryRepository
 * @package App\Repositories\MiniGameScenery
 */
class MiniGameSceneryRepository extends Repository implements MiniGameSceneryRepositoryInterface
{
    /**
     * @var miniGameScenery
     */
    protected $model;

    /**
     * MiniGameSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new MiniGameScenery();
        parent::__construct($this->model);
    }
}
