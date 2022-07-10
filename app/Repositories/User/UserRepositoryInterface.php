<?php

namespace App\Repositories\User;

/**
 * Interface UserRepositoryInterface
 * @package App\Repositories\User
 */
interface UserRepositoryInterface
{
    public function create($data);
    public function getUserByName($name);
    public function getUserById($id);
    public function getUserByEmail($email);
}
