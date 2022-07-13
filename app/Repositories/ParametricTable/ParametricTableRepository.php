<?php

namespace App\Repositories\ParametricTable;

use App\Models\ParametricTable;
use App\Repositories\Repository;


/**
 * Class ParametricTableRepository
 * @package App\Repositories\ParametricTable
 */
class ParametricTableRepository extends Repository implements ParametricTableRepositoryInterface
{
    /**
     * @var parametricTable
     */
    protected $model;

    /**
     * ParametricTableRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ParametricTable();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
