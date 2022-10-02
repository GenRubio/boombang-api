<?php

namespace App\Http\Controllers\Api\v1\Sceneries\PublicScenery\Interfaces;

use Illuminate\Http\Request;

interface PublicSceneriesControllerInterface
{
    /**
     * @OA\Get(
     * path="/sceneries/publics",
     * summary="Get Public Esceneries",
     * description="Get Public Esceneries",
     * operationId="getPublicEsceneries",
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
