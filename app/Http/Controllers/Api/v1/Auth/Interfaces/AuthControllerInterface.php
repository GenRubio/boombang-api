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
     *    @OA\MediaType(mediaType="multipart/form-data",
     *        @OA\Schema(
     *           required={"email","password"},
     *             @OA\Property(
     *                property="email",
     *                type="string",
     *                format="email",
     *                description="Email"
     *             ),
     *             @OA\Property(
     *                property="password",
     *                type="string",
     *                format="password",
     *                description="Password"
     *             ),
     *         )
     *     )
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     * 
     */
    public function login(Request $request);
}
