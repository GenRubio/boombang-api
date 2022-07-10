<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use App\Repositories\MenuCategory\MenuCategoryRepository;
/**
 * Class MenuCategoryService
 * @package App\Services\MenuCategory
 */
class MenuCategoryService extends Controller
{
    /**
     * MenuCategoryService constructor.
     * @param MenuCategory $menucategory
     */
    public function __construct()
    {
        $this->MenuCategoryRepository = new MenuCategoryRepository();
    }

}
