<?php

namespace App\Repositories\CatalogueCategory;

use App\Models\CatalogueCategory;
use App\Repositories\Repository;


/**
 * Class CatalogueCategoryRepository
 * @package App\Repositories\CatalogueCategory
 */
class CatalogueCategoryRepository extends Repository implements CatalogueCategoryRepositoryInterface
{
    /**
     * @var catalogueCategory
     */
    protected $model;

    /**
     * CatalogueCategoryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new CatalogueCategory();
        parent::__construct($this->model);
    }
}
