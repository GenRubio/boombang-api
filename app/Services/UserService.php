<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services\User
 */
class UserService extends Controller
{
    private $userRepository;
    /**
     * UserService constructor.
     * @param User $user
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
}
