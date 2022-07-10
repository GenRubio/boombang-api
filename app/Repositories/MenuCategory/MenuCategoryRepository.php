<?php

namespace App\Repositories\MenuCategory;

use App\Models\MenuCategory;
use App\Repositories\Repository;


/**
 * Class MenuCategoryRepository
 * @package App\Repositories\MenuCategory
 */
class MenuCategoryRepository extends Repository implements MenuCategoryRepositoryInterface
{
    /**
     * @var menuCategory
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
}
