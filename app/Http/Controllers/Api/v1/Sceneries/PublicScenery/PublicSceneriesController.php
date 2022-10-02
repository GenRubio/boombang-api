<?php

namespace App\Http\Controllers\Api\v1\Sceneries\PublicScenery;

use Exception;
use ErrorException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PublicSceneryService;
use App\Http\Resources\PublicScenery\PublicSceneryCollection;
use App\Http\Controllers\Api\v1\Sceneries\PublicScenery\Interfaces\PublicSceneriesControllerInterface;

class PublicSceneriesController extends Controller implements PublicSceneriesControllerInterface
{
    public function getAll()
    {
        try{
            $sceneries = (new PublicSceneryService())->getAll();
            return response()->json(new PublicSceneryCollection($sceneries));
        }
        catch(ErrorException $e){
            return response()->json(['error' => $e->getMessage()]);
        }
        catch(Exception $e){
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
