<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    title="BoomBang API",
 *    version="1.0.0",
 *    description="BoomBang API - Swagger
 *    To be able to authorize api write in Authorize: Bearer {token}",
 * )
 * @OA\Server(
 *    description="",
 *    url="http://127.0.0.1:8000/api/v1/"
 * ),
 */
//php artisan l5-swagger:generate
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
