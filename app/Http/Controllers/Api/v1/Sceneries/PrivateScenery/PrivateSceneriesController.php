<?php

namespace App\Http\Controllers\Api\v1\Sceneries\PrivateScenery;

use Exception;
use ErrorException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PrivateSceneryService;
use App\Http\Resources\PrivateScenery\PrivateSceneryCollection;
use App\Http\Controllers\Api\v1\Sceneries\PrivateScenery\Interfaces\PrivateSceneriesControllerInterface;

class PrivateSceneriesController extends Controller implements PrivateSceneriesControllerInterface
{
    public function getAll()
    {
        try{
            $sceneries = (new PrivateSceneryService())->getAll();
            return response()->json(new PrivateSceneryCollection($sceneries));
        }
        catch(ErrorException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
