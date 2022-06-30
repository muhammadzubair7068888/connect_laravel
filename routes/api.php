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
        Route::post('/add', [ApiController::class, 'add_user']);
        Route::get('/view/{id}', [ApiController::class, 'user_view']);
        Route::get('/all', [ApiController::class, 'user_get']);
        Route::get('', [ApiController::class, 'user_all']);
        Route::post('/update/{id}', [ApiController::class, 'update_user_save']);
        Route::post('/delete/{id}', [ApiController::class, 'user_delete']);
    });
    Route::prefix('/questionnaire')->group(function () {
        Route::get('/index', [ApiController::class, 'question']);
        Route::post('/save', [ApiController::class, 'save_question']);
        Route::post('/del/{id}', [ApiController::class, 'delete_question']);
    });
    Route::prefix('/assessment')->group(function () {
        Route::get('/physical/index', [ApiController::class, 'phyiscal']);
        Route::post('/physical/add', [ApiController::class, 'add_phyiscal']);
        Route::post('/physical/del', [ApiController::class, 'delete_phyiscal']);
        Route::post('/physical/update', [ApiController::class, 'physical_update_status']);
        Route::get('/mechanical/index', [ApiController::class, 'mechanical']);
        Route::post('/mechanical/add', [ApiController::class, 'add_mechanical']);
        Route::post('/mechanical/del', [ApiController::class, 'delete_mechanical']);
        Route::post('/mechanical/update', [ApiController::class, 'mechanical_update_status']);
    });
    Route::prefix('/exercises')->group(function () {
        Route::get('/index', [ApiController::class, 'index']);
        Route::get('/types', [ApiController::class, 'types']);
        Route::post('/add', [ApiController::class, 'save_exercises']);
        Route::get('/detail/{id}', [ApiController::class, 'detail_exercises']);
        Route::post('/edit/{id}', [ApiController::class, 'save_edit_exercises']);
        Route::post('/del', [ApiController::class, 'delete_exercise']);
        // Route::get('/edit/{id}', [ExerciseController::class, 'edit_exercises'])->name('edit.exercise');
    });
    Route::prefix('/files')->group(function () {
        // Route::get('/index/{id?}', [FileController::class, 'index'])->name('file');
        Route::post('/index', [ApiController::class, 'save_file']);
        // Route::post('/delete', [FileController::class, 'delete_file'])->name('delete.file');
        // Route::get('/download/{id}', [FileController::class, 'download_file'])->name('download.file');
    });
});