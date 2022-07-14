<?php

namespace App\Repositories\DataUser;

use App\Models\DataUser;
use App\Repositories\Repository;


/**
 * Class DataUserRepository
 * @package App\Repositories\DataUser
 */
class DataUserRepository extends Repository implements DataUserRepositoryInterface
{
    /**
     * @var dataUser
     */
    protected $model;

    /**
     * DataUserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new DataUser();
        parent::__construct($this->model);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
