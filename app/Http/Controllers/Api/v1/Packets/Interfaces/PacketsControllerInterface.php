<?php

namespace App\Http\Controllers\Api\v1\Packets\Interfaces;

interface PacketsControllerInterface
{
    /**
     * @OA\Get(
     * path="/packets",
     * summary="Game Packets",
     * description="Game Packets",
     * operationId="getGamePackets",
     * tags={"Utils"},
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
    public function get();
}
