<?php
namespace App\Http\Controllers\Admin\Apis;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Traits\ApiTrait;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiTrait;
    public function login(LoginRequest $request)
    {
        $admin = Admin::where('email',$request->email)->first();
        if(! Hash::check($request->password,$admin->password)){
            return $this->errorResponse(['email'=>'wrong email or password'],'Failed Attempt',401);
        }
        $admin->token = "Bearer ".$admin->createToken($request->device_name)->plainTextToken;

        if(is_null($admin->email_verified_at)){
            return $this->data(compact('admin'),"Admin Not Verified",401);
        }
        return $this->data(compact('admin'));
    }

    public function logoutCurrentToken(Request $request)
    {
        $request->user('sanctum')->currentAccessToken()->delete();
        return $this->successResponse("Your Are Logged Out Successfully");
    }

    public function logoutSpecificToken(Request $request)
    {
        $request->validate([
            'tokenId'=>['required','integer','exists:personal_access_tokens,id']
        ]);
        $request->user('sanctum')->tokens()->where('id',$request->tokenId)->delete();
        return $this->successResponse("Your Are Logged Out Successfully");

    }

    public function logoutAllTokens(Request $request)
    {
        $request->user('sanctum')->tokens()->delete();
        return $this->successResponse("Your Are Logged Out Successfully");
    }
}
