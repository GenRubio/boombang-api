<?php

namespace App\Repositories\Parametric\ObjectInteraction;

use App\Models\Parametric\ObjectInteraction;
use App\Repositories\Repository;


/**
 * Class ObjectInteractionRepository
 * @package App\Repositories\ObjectInteraction
 */
class ObjectInteractionRepository extends Repository implements ObjectInteractionRepositoryInterface
{
    /**
     * @var ObjectInteraction
     */
    protected $model;

    /**
     * ObjectInteractionRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ObjectInteraction();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
