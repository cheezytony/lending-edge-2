<?php

namespace App\Http\Controllers;

use App\Traits\ReturnsAuthenticationResponse;
use App\Traits\ReturnsJsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ReturnsAuthenticationResponse;
    use ReturnsJsonResponse;
    use ValidatesRequests;
}
