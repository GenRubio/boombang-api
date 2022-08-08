<?php

namespace App\Http\Controllers\Api\v1\Auth\Interfaces;

use Illuminate\Http\Request;

interface AuthControllerInterface
{
    public function register(Request $request);

    /**
     * @OA\Post(
     * path="/auth/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"Authentication"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass filters for invoices",
     *    @OA\JsonContent(
     *       required={"data"},
     *       @OA\Property(
     *           property="data",
     *           type="object",
     *           example={
     *              "name": "Admin",
     *              "password": "admin"
     *           }
     *       ),
     *    ),
     * ),
     * @OA\Response(
     *    response=200,
     *    description="Results limit exceeded",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong username or password. Please try again")
     *        )
     *     )
     * )
     * 
     */
    public function login(Request $request);
}
