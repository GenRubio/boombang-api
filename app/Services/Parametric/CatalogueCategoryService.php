<?php

namespace App\Services\Parametric;

use App\Http\Controllers\Controller;
use App\Models\Parametric\CatalogueCategory;
use App\Repositories\Parametric\CatalogueCategory\CatalogueCategoryRepository;

/**
 * Class CatalogueCategoryService
 * @package App\Services\CatalogueCategory
 */
class CatalogueCategoryService extends Controller
{
    /**
     * CatalogueCategoryService constructor.
     * @param CatalogueCategory $CatalogueCategory
     */
    public function __construct()
    {
        $this->catalogueCategoryRepository = new CatalogueCategoryRepository();
    }

    public function getAll()
    {
        return $this->catalogueCategoryRepository->getAll();
    }
}
