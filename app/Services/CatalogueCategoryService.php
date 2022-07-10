<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\CatalogueCategory;
use App\Repositories\CatalogueCategory\CatalogueCategoryRepository;
/**
 * Class CatalogueCategoryService
 * @package App\Services\CatalogueCategory
 */
class CatalogueCategoryService extends Controller
{
    /**
     * CatalogueCategoryService constructor.
     * @param CatalogueCategory $cataloguecategory
     */
    public function __construct()
    {
        $this->CatalogueCategoryRepository = new CatalogueCategoryRepository();
    }

}
