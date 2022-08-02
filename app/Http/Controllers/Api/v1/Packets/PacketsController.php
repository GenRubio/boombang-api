<?php

namespace App\Http\Controllers\Api\v1\Packets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GamePackets\GamePacketsResource;
use App\Http\Controllers\Api\v1\Packets\Interfaces\PacketsControllerInterface;

class PacketsController extends Controller implements PacketsControllerInterface
{
    public function get()
    {
        return response()->json(new GamePacketsResource(null));
    }
}
