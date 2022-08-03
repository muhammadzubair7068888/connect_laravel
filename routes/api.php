<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Chat\API\AuthAPIController;
use App\Http\Controllers\Chat\API\ChatAPIController;
use App\Http\Controllers\Chat\API\GroupAPIController;
use App\Http\Controllers\Chat\API\UserAPIController;

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
        $request->user()->update(['is_online' => 0, 'last_seen' => now()]);
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
        Route::post('/graph/settings', [ApiController::class, 'update_setting']);
        Route::post('/graph', [ApiController::class, 'graph']);
    });
    Route::prefix('/users')->group(function () {
        Route::post('/add', [ApiController::class, 'add_user']);
        Route::get('/view/{id}', [ApiController::class, 'user_view']);
        Route::get('/all', [ApiController::class, 'user_get']);
        Route::get('', [ApiController::class, 'user_all']);
        Route::post('/update/{id}', [ApiController::class, 'update_user_save']);
        Route::post('/delete/{id}', [ApiController::class, 'user_delete']);
        Route::get('/leaderboard', [ApiController::class, 'leaderboard']);
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
        Route::post('/physical/lr', [ApiController::class, 'physical_left_right']);
        Route::post('/mechanical/lr', [ApiController::class, 'mechnical_left_right']);
        Route::post('/phy/l', [ApiController::class, 'phyl']);
        Route::post('/phy/r', [ApiController::class, 'phyr']);
        Route::post('/mech/l', [ApiController::class, 'mechl']);
        Route::post('/mech/r', [ApiController::class, 'mechr']);
    });
    Route::prefix('/exercises')->group(function () {
        Route::get('/index', [ApiController::class, 'index']);
        Route::get('/types', [ApiController::class, 'types']);
        Route::post('/add', [ApiController::class, 'save_exercises']);
        Route::get('/detail/{id}', [ApiController::class, 'detail_exercises']);
        Route::post('/edit/{id}', [ApiController::class, 'save_edit_exercises']);
        Route::post('/del', [ApiController::class, 'delete_exercise']);
        // Route::get('/edit/{id}', [ExerciseController::class, 'edit_exercises'])->name('edit.exercise');
        Route::post('/schedule', [ApiController::class, 'shadule_calender']);
        Route::get('/users', [ApiController::class, 'users']);
        Route::post('/schedule/update', [ApiController::class, 'schedule_update']);
        Route::post('/schedule/print', [ApiController::class, 'schedule_print']);
        Route::get('/schedule/exercise/{id}', [ApiController::class, 'schedule_view']);
        Route::put('/schedule/exercise/{exercise_detail}/strength', [ApiController::class, 'update_exercise_strength']);
        Route::get('/users', [ApiController::class, 'exercise_user']);
        Route::post('/csv', [ApiController::class, 'import_exercise']);
    });
    Route::prefix('/files')->group(function () {
        Route::get('/index/{id?}', [ApiController::class, 'files']);
        Route::post('/index', [ApiController::class, 'save_file']);
        Route::post('/delete', [ApiController::class, 'delete_file']);
        // Route::get('/download/{id}', [FileController::class, 'download_file'])->name('download.file');
    });
    Route::get('site/setting', [ApiController::class, 'site_setting']);

    /***********************************************************************************************************************
     * Chat API's
     **********************************************************************************************************************/
    Route::post('broadcasting/auth', '\Illuminate\Broadcasting\BroadcastController@authenticate');
    // Route::get('logout', [AuthAPIController::class, 'logout']);

    //get all user list for chat
    Route::get('users-list', [UserAPIController::class, 'getUsersList']);
    Route::post('change-password', [UserAPIController::class, 'changePassword']);

    // Route::get('profile', [UserAPIController::class,'getProfile'])->name('myprofile');
    Route::post('profile', [UserAPIController::class, 'updateProfile']);
    Route::post('update-last-seen', [UserAPIController::class, 'updateLastSeen']);

    Route::post('send-message', [ChatAPIController::class, 'sendMessage'])->name('conversations.store');
    Route::get('users/{id}/conversation', [UserAPIController::class, 'getConversation']);
    Route::get('conversations', [ChatAPIController::class, 'getLatestConversations']);
    Route::post('read-message', [ChatAPIController::class, 'updateConversationStatus']);
    Route::post('file-upload', [ChatAPIController::class, 'addAttachment'])->name('file-upload');
    Route::get('conversations/{userId}/delete', [ChatAPIController::class, 'deleteConversation']);

    /** Update Web-push */
    Route::put('update-web-notifications', [UserAPIController::class, 'updateNotification']);

    /** create group **/
    Route::post('groups', [GroupAPIController::class, 'create'])->name('create-group');
});