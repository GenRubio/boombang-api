<?php

namespace App\Http\Controllers\Api\v1\Sceneries\Interfaces;

use Illuminate\Http\Request;

interface SceneriesControllerInterface
{
    /**
     * @OA\Get(
     * path="/sceneries",
     * summary="Get Esceneries",
     * description="Get Esceneries",
     * operationId="getEsceneries",
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
