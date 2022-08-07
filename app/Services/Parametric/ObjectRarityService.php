<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\ObjectRarity;
use App\Repositories\Parametric\ObjectRarity\ObjectRarityRepository;

/**
 * Class ObjectRarityService
 * @package App\Services\ObjectRarity
 */
class ObjectRarityService extends Controller
{
    /**
     * ObjectRarityService constructor.
     * @param ObjectRarity $ObjectRarity
     */
    public function __construct()
    {
        $this->objectRarityRepository = new ObjectRarityRepository();
    }

    public function getAll()
    {
        return $this->objectRarityRepository->getAll();
    }
}
