<?php

namespace App\Http\Controllers\Admin\Apis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $admin = $request->user('sanctum');
        $admin->token = $request->header('Authorization');
        return $this->data(compact('admin'));
    }
}
