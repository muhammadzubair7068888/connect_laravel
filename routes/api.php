<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

// API'S not to be authenticated ...
// Sign In API
Route::post('signin', [ApiController::class, 'signIn']);

Route::middleware('auth:api')->group(function () {
    // API'S to be authenticated ...
    Route::get('logout', function (Request $request) {
        $request->user()->token()->revoke();
        return response()->json(['success' => true, 'message' => 'You have signed out']);
    });

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ApiController::class, 'profile']);
        Route::post('update/{id}',[ApiController::class,'update_profile']);
        // Route::post('/edit', [SettingController::class, 'company_settings'])->name('company_setting');
    });
});