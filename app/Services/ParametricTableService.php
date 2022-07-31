<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\ParametricTable;
use App\Repositories\ParametricTable\ParametricTableRepository;

/**
 * Class ParametricTableService
 * @package App\Services\ParametricTable
 */
class ParametricTableService extends Controller
{
    /**
     * ParametricTableService constructor.
     * @param ParametricTable $parametrictable
     */
    public function __construct()
    {
        $this->parametricTableRepository = new ParametricTableRepository();
    }

    public function getAll()
    {
        return $this->parametricTableRepository->getAll();
    }
}
