<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\CharacterLook;
use App\Repositories\Parametric\CharacterLook\CharacterLookRepository;

/**
 * Class CharacterLookService
 * @package App\Services\CharacterLook
 */
class CharacterLookService extends Controller
{
    /**
     * CharacterLookService constructor.
     * @param CharacterLook $CharacterLook
     */
    public function __construct()
    {
        $this->characterLookRepository = new CharacterLookRepository();
    }

    public function getAll()
    {
        return $this->characterLookRepository->getAll();
    }
}
