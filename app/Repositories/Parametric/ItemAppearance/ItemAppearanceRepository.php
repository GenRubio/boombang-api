<?php

namespace App\Repositories\Parametric\ItemAppearance;

use App\Models\Parametric\ItemAppearance;
use App\Repositories\Repository;


/**
 * Class ItemAppearanceRepository
 * @package App\Repositories\ItemAppearance
 */
class ItemAppearanceRepository extends Repository implements ItemAppearanceRepositoryInterface
{
    /**
     * @var ItemAppearance
     */
    protected $model;

    /**
     * ItemAppearanceRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ItemAppearance();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
