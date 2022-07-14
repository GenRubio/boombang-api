<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\DataUser;
use App\Repositories\DataUser\DataUserRepository;

/**
 * Class DataUserService
 * @package App\Services\DataUser
 */
class DataUserService extends Controller
{
    /**
     * DataUserService constructor.
     * @param DataUser $datauser
     */
    public function __construct()
    {
        $this->dataUserRepository = new DataUserRepository();
    }

    public function create($data)
    {
        return $this->dataUserRepository->create($data);
    }
}
