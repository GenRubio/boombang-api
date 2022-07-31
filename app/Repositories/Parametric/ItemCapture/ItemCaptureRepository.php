<?php

namespace App\Repositories\Parametric\ItemCapture;

use App\Models\Parametric\ItemCapture;
use App\Repositories\Repository;


/**
 * Class ItemCaptureRepository
 * @package App\Repositories\ItemCapture
 */
class ItemCaptureRepository extends Repository implements ItemCaptureRepositoryInterface
{
    /**
     * @var ItemCapture
     */
    protected $model;

    /**
     * ItemCaptureRepository constructor.
     */
    public function __construct()
    {
        $this->model = new ItemCapture();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
