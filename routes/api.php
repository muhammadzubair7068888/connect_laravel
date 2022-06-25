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
    Route::get('signout', function (Request $request) {
        $request->user()->token()->revoke();
        return response()->json(['success' => true, 'message' => 'You have signed out.']);
    });

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ApiController::class, 'profile']);
        Route::post('/update/{id}', [ApiController::class, 'update_profile']);
        // Route::post('/edit', [SettingController::class, 'company_settings'])->name('company_setting');
    });

    Route::prefix('/tracks')->group(function () {
        Route::get('/index', [ApiController::class, 'index_track']);
        Route::post('/index', [ApiController::class, 'save_track']);
        Route::post('/del', [ApiController::class, 'delete_track']);
    });

    Route::prefix('/velocity')->group(function () {
        Route::get('/velocities', [ApiController::class, 'velocities']);
        Route::get('/user_velocities', [ApiController::class, 'user_velocities']);
        Route::post('/index', [ApiController::class, 'save_velocity']);
        Route::post('/del', [ApiController::class, 'delete_velocity']);
    });

    Route::prefix('/users')->group(function () {
        Route::post('add', [ApiController::class, 'add_user']);
    });
});