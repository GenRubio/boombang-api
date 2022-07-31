<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\MenuCategory;
use App\Repositories\Parametric\MenuCategory\MenuCategoryRepository;

/**
 * Class MenuCategoryService
 * @package App\Services\MenuCategory
 */
class MenuCategoryService extends Controller
{
    /**
     * MenuCategoryService constructor.
     * @param MenuCategory $MenuCategory
     */
    public function __construct()
    {
        $this->MenuCategoryRepository = new MenuCategoryRepository();
    }

    public function getAll()
    {
        return $this->MenuCategoryRepository->getAll();
    }
}
