<?php

namespace App\Repositories\Parametric\ObjectRarity;

use App\Models\Parametric\ObjectRarity;
use App\Repositories\Repository;


/**
 * Class ObjectRarityRepository
 * @package App\Repositories\ObjectRarity
 */
class ObjectRarityRepository extends Repository implements ObjectRarityRepositoryInterface
{
    /**
     * @var ObjectRarity
     */
    protected $model;

    /**
     * ObjectRarityRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ObjectRarity();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
