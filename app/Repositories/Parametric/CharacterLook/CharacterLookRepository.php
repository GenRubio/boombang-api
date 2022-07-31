<?php

namespace App\Repositories\Parametric\CharacterLook;

use App\Models\Parametric\CharacterLook;
use App\Repositories\Repository;


/**
 * Class CharacterLookRepository
 * @package App\Repositories\CharacterLook
 */
class CharacterLookRepository extends Repository implements CharacterLookRepositoryInterface
{
    /**
     * @var CharacterLook
     */
    protected $model;

    /**
     * CharacterLookRepository constructor.
     */
    public function __construct()
    {
        $this->model = new CharacterLook();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
