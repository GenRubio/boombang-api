<?php

namespace App\Repositories\ParametricTableValue;

use App\Models\ParametricTableValue;
use App\Repositories\Repository;


/**
 * Class ParametricTableValueRepository
 * @package App\Repositories\ParametricTableValue
 */
class ParametricTableValueRepository extends Repository implements ParametricTableValueRepositoryInterface
{
    /**
     * @var parametricTableValue
     */
    protected $model;

    /**
     * ParametricTableValueRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ParametricTableValue();
        parent::__construct($this->model);
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }
}
