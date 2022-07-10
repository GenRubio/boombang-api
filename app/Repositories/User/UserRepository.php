<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserRepository
 * @package App\Repositories\User
 */
class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @var user
     */
    protected $model;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new User();
        parent::__construct($this->model);
    }

    public function create($data)
    {
        $this->model::insert($data);
    }

    public function getUserByName($name)
    {
        return $this->model->where('name', $name)->first();
    }

    public function getUserById($id){
        return $this->model->where('id', $id)->first();
    }

    public function getUserByEmail($email){
        return $this->model->where('email', $email)->first();
    }
}
