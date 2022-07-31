<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\ParametricTableValue;
use App\Repositories\ParametricTableValue\ParametricTableValueRepository;
/**
 * Class ParametricTableValueService
 * @package App\Services\ParametricTableValue
 */
class ParametricTableValueService extends Controller
{
    /**
     * ParametricTableValueService constructor.
     * @param ParametricTableValue $parametrictablevalue
     */
    public function __construct()
    {
        $this->parametricTableValueRepository = new ParametricTableValueRepository();
    }

}
