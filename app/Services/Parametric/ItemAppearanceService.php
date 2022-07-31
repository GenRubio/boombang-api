<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\ItemAppearance;
use App\Repositories\Parametric\ItemAppearance\ItemAppearanceRepository;

/**
 * Class ItemAppearanceService
 * @package App\Services\ItemAppearance
 */
class ItemAppearanceService extends Controller
{
    /**
     * ItemAppearanceService constructor.
     * @param ItemAppearance $ItemAppearance
     */
    public function __construct()
    {
        $this->itemAppearanceRepository = new ItemAppearanceRepository();
    }

    public function getAll()
    {
        return $this->itemAppearanceRepository->getAll();
    }
}
