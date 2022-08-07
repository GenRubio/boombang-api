<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\ObjectInteraction;
use App\Repositories\Parametric\ObjectInteraction\ObjectInteractionRepository;

/**
 * Class ObjectInteractionService
 * @package App\Services\ObjectInteraction
 */
class ObjectInteractionService extends Controller
{
    /**
     * ObjectInteractionService constructor.
     * @param ObjectInteraction $ObjectInteraction
     */
    public function __construct()
    {
        $this->objectInteractionRepository = new ObjectInteractionRepository();
    }

    public function getAll()
    {
        return $this->objectInteractionRepository->getAll();
    }
}
