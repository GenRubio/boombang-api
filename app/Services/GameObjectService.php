<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\GameObject;
use App\Repositories\GameObject\GameObjectRepository;
/**
 * Class GameObjectService
 * @package App\Services\GameObject
 */
class GameObjectService extends Controller
{
    /**
     * GameObjectService constructor.
     * @param GameObject $gameobject
     */
    public function __construct()
    {
        $this->GameObjectRepository = new GameObjectRepository();
    }

}
