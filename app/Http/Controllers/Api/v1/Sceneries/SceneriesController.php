<?php

namespace App\Http\Controllers\Api\v1\Sceneries;

use Exception;
use ErrorException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PublicSceneryService;
use App\Http\Resources\PublicScenery\PublicSceneryCollection;
use App\Http\Controllers\Api\v1\Sceneries\Interfaces\SceneriesControllerInterface;

class SceneriesController extends Controller implements SceneriesControllerInterface
{
    public function getPublicsAll()
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
