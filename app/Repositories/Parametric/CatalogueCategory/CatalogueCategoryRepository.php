<?php

namespace App\Repositories\Parametric\CatalogueCategory;

use App\Models\Parametric\CatalogueCategory;
use App\Repositories\Repository;


/**
 * Class CatalogueCategoryRepository
 * @package App\Repositories\CatalogueCategory
 */
class CatalogueCategoryRepository extends Repository implements CatalogueCategoryRepositoryInterface
{
    /**
     * @var CatalogueCategory
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

    public function getAll()
    {
        return $this->model->all();
    }
}
