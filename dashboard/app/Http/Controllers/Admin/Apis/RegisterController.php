<?php

namespace App\Http\Controllers\Admin\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RegisterRequest;
use App\Models\Admin;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use ApiTrait;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->safe()->except('password_confirmation');
        $data['password'] = Hash::make($request->password);
        $admin = Admin::create($data);
        $admin->token = "Bearer ".$admin->createToken($request->device_name)->plainTextToken;
        return $this->data(compact('admin'));
    }
}
