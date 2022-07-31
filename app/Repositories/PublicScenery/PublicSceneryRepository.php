<?php

namespace App\Repositories\PublicScenery;

use App\Models\PublicScenery;
use App\Repositories\Repository;


/**
 * Class PublicSceneryRepository
 * @package App\Repositories\PublicScenery
 */
class PublicSceneryRepository extends Repository implements PublicSceneryRepositoryInterface
{
    /**
     * @var publicScenery
     */
    protected $model;

    /**
     * PublicSceneryRepository constructor.
     */
    public function __construct()
    {
        $this->model = new PublicScenery();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->active()->get();
    }
}
