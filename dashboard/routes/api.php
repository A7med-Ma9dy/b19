<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Apis\LoginController;
use App\Http\Controllers\Admin\Apis\ProfileController;
use App\Http\Controllers\Admin\Apis\RegisterController;
use App\Http\Controllers\Admin\Apis\VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('dashboard')->group(function () {
    Route::prefix('products')->controller(ProductController::class)->middleware('verified.api:sanctum')->group(function () {
        Route::get('/', 'index'); //dashboard/products
        Route::get('/create', 'create'); //
        Route::get('/edit/{id}', 'edit');
        Route::post('/store', 'store');
        Route::post('/update/{id}', 'update');
        Route::post('/update/{id}/status/{status}', 'updateStatus');
        Route::post('/destroy/{id}', 'destroy');
    });

    Route::prefix('admins')->group(function () {
        // guest
        Route::post('/register', RegisterController::class);
        Route::post('/login', [LoginController::class,'login']);
        // verified
        Route::middleware('verified.api:sanctum')->group(function(){
            Route::controller(LoginController::class)->group(function(){
                Route::post('/logout-current-token', 'logoutCurrentToken');
                Route::post('/logout-specific-token', 'logoutSpecificToken');
                Route::post('/logout-all-tokens', 'logoutAllTokens');
            });
            Route::get('/profile',ProfileController::class);
        });
        // auth
        Route::middleware('auth:sanctum')->controller(VerificationController::class)->group(function(){
            Route::post('/send-code', 'sendCode');
            Route::post('/verify-code', 'verifyCode');
        });
    });
});
