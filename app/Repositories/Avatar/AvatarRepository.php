<?php

namespace App\Repositories\Avatar;

use App\Models\Avatar;
use App\Repositories\Repository;


/**
 * Class AvatarRepository
 * @package App\Repositories\Avatar
 */
class AvatarRepository extends Repository implements AvatarRepositoryInterface
{
    /**
     * @var avatar
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
}
