<?php

namespace App\Http\Controllers\Api\v1\Sceneries\PrivateScenery\Interfaces;

use Illuminate\Http\Request;

interface PrivateSceneriesControllerInterface
{
    /**
     * @OA\Get(
     * path="/sceneries/privates",
     * summary="Get Privates Esceneries",
     * description="Get Privates Esceneries",
     * operationId="getPrivatesEsceneries",
     * tags={"Sceneries"},
     * @OA\Response(
     *    response=200,
     *    description="Results limit exceeded",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="")
     *        )
     *     )
     * )
     * 
     */
    public function getAll();
}
