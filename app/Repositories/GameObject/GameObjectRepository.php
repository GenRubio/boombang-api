<?php

namespace App\Repositories\GameObject;

use App\Models\GameObject;
use App\Repositories\Repository;


/**
 * Class GameObjectRepository
 * @package App\Repositories\GameObject
 */
class GameObjectRepository extends Repository implements GameObjectRepositoryInterface
{
    /**
     * @var gameObject
     */
    protected $model;

    /**
     * GameObjectRepository constructor.
     */
    public function __construct()
    {
        $this->model = new GameObject();
        parent::__construct($this->model);
    }
}
