<?php

namespace App\Http\Controllers\Api\v1\Sceneries\Interfaces;

use Illuminate\Http\Request;

interface SceneriesControllerInterface
{
    /**
     * @OA\Get(
     * path="/eseneries/publics/all",
     * summary="Get Public Esceneries",
     * description="Get Public Esceneries",
     * operationId="getPublicEsceneries",
     * tags={"Esceneries"},
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
