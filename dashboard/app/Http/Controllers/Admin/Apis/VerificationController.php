<?php

namespace App\Http\Controllers\Admin\Apis;

use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\VerifyCodeRequest;

class VerificationController extends Controller
{
    use ApiTrait;
    public function sendCode(Request $request)
    {
        $admin = Auth::guard('sanctum')->user();
        $code = rand(100000,999999);
        $admin->verification_code = $code;
        $admin->save();
        $admin->token = $request->header('Authorization');
        return $this->data(compact('admin'));
    }
    public function verifyCode(VerifyCodeRequest $request)
    {
        $admin = Auth::guard('sanctum')->user();
        if($admin->verification_code == $request->code){
            $admin->email_verified_at = date('Y-m-d H:i:s');
            $admin->save();
            return $this->data(compact('admin'),"Admin Is Verified",200);
        }
        $admin->token = $request->header('Authorization');
        return $this->data(compact('admin'),"Wrong Code",422);
    }

}
