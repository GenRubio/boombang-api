<?php

namespace App\Repositories\Parametric\MenuCategory;

use App\Models\Parametric\MenuCategory;
use App\Repositories\Repository;


/**
 * Class MenuCategoryRepository
 * @package App\Repositories\MenuCategory
 */
class MenuCategoryRepository extends Repository implements MenuCategoryRepositoryInterface
{
    /**
     * @var MenuCategory
     */
    protected $model;

    /**
     * MenuCategoryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new MenuCategory();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
