<?php

namespace App\Repositories\Parametric\Avatar;

use App\Models\Parametric\Avatar;
use App\Repositories\Repository;


/**
 * Class AvatarRepository
 * @package App\Repositories\Avatar
 */
class AvatarRepository extends Repository implements AvatarRepositoryInterface
{
    /**
     * @var Avatar
     */
    protected $model;

    /**
     * AvatarRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Avatar();
        parent::__construct($this->model);
    }

    public function getAll()
    {
        return $this->model->all();
    }
}
