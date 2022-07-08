<?php

use App\Http\Controllers\superadmin\AssessmentController;
use App\Http\Controllers\superadmin\ChatController;
use App\Http\Controllers\superadmin\ExerciseController;
use App\Http\Controllers\superadmin\FileController;
use App\Http\Controllers\superadmin\QuestionnaireController;
use App\Http\Controllers\superadmin\SettingController;
use App\Http\Controllers\superadmin\UserController;
use App\Http\Controllers\superadmin\TrackController;
use App\Http\Controllers\superadmin\VelocityController;
use App\Models\Velocity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Route::get('admin', [UserController::class, 'index'])->name('index');
// Route::post('admin', [UserController::class, 'login'])->name('login');
// Route::post('admin/logout', [UserController::class, 'logout'])->name('logout');
// \Artisan::call('passport:install');

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::prefix('')->middleware('isAuthUser')->group(function () {
    //Update User Details
    // Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
    // Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
    Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    //Language Translation

Route::get('email/{template?}', [SettingController::class, 'get_tempalte'])->name('email');
Route::post('/save-email-template/{name}', [SettingController::class, 'saveTemplate'])->name('save-template');
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
Route::get('/your/profile',[SettingController::class, 'profiel'])->name('profile');
Route::post('/your/profile/{id}{',[SettingController::class, 'update_profile'])->name('update.profile');
Route::get('site/setting',[SettingController::class,'site_setting'])->name('site.setting');

Route::prefix('/company/settings')->group(function () {
    Route::get('/', [SettingController::class, 'shows_ettings'])->name('show_setting');
    Route::post('/edit', [SettingController::class, 'company_settings'])->name('company_setting');
  
});
Route::prefix('/chat')->group(function () {
    Route::get('/open', [ChatController::class, 'chat'])->name('chat');
});
Route::prefix('/plugins')->group(function () {
    Route::get('/cards', [SettingController::class, 'plugin'])->name('plugin.cards');
    Route::post('google-credentials', [SettingController::class, 'google_creditional'])->name("google-credentials");
    Route::post('facebook-credentials', [SettingController::class, 'facebook_credentials'])->name("facebook-credentials");
});
Route::prefix('/exercises')->group(function () {
    Route::get('/index', [ExerciseController::class, 'index'])->name('exercises');
    Route::get('/add', [ExerciseController::class, 'add_exercises'])->name('add.exercises');
    Route::post('/index', [ExerciseController::class, 'save_exercises'])->name('save.exercises');
    Route::get('/detail/{id}', [ExerciseController::class, 'detail_exercises'])->name('view.exercise.detail');
    Route::get('/edit/{id}', [ExerciseController::class, 'edit_exercises'])->name('edit.exercise');
    Route::post('/edit/{id}', [ExerciseController::class, 'save_edit_exercises'])->name('save.edit_exercise');
    Route::post('/del',[ExerciseController::class, 'delete_exercise'])->name('delete.exercise');
    Route::get('/copy/{id}',[ExerciseController::class, 'copy_exercise'])->name('copy.exercise');
    Route::post('/shair', [ExerciseController::class, 'shair_exercise'])->name('shair.exercise');
    Route::get('/schedule', [ExerciseController::class, 'shadule_calender'])->name('schedule.exercise');
    Route::post('/schedule',[ExerciseController::class, 'schedule'])->name('schedule');
});
Route::prefix('/users')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('users');
    Route::get('/new', [UserController::class, 'new_user'])->name('new.user');
    Route::post('add', [UserController::class, 'add_user'])->name('add.user');
    Route::get('/update/{id}', [UserController::class, 'update_user'])->name('update.user');
    Route::post('/update/{id}',[UserController::class, 'update_user_save'])->name('update.user.save');
    Route::get('/leaderboard',[UserController::class, 'leaderboard'])->name('leaderboard');
    Route::get('/gird/view',[UserController::class,'grid_view'])->name('user.grid.view');
    Route::get('delete/{id}',[UserController::class,'delete_user'])->name('delete.user');
    Route::get('/view/{id}', [UserController::class, 'user_view'])->name('user.view');
    Route::post('/leaderboard/filter', [UserController::class, 'filter_leaderboard'])->name('filter.leaderboard');

});
Route::prefix('/tracks')->group(function () {
    Route::get('/index', [TrackController::class, 'index'])->name('tracks');
    Route::post('/index', [TrackController::class, 'save'])->name('save.tracks');
    Route::post('/del',[TrackController::class,'delete'])->name('delete.track');
});
Route::prefix('/velocity')->group(function () {
    Route::get('/index', [VelocityController::class, 'index'])->name('velocity');
    Route::post('/index',[VelocityController::class,'save_velocity'])->name('save.velocity');
    Route::post('/del', [VelocityController::class, 'delte_velocity'])->name('delete.velocity');
    Route::get('/dashboard',[VelocityController::class,'chart_velocity'])->name('chart.velocity');
    Route::post('dashboard/search',[VelocityController::class,'search_velocity'])->name('search.velocity');
    Route::post('/graph/settings',[VelocityController::class,'update_setting'])->name('graph.setting');
});
Route::prefix('/questionnaire')->group(function () {
    Route::get('/index', [QuestionnaireController::class, 'index'])->name('questionnaire');
    Route::post('/index', [QuestionnaireController::class, 'save_question'])->name('save.questionnaire');
    Route::post('/del', [QuestionnaireController::class, 'delete_question'])->name('delete.questionnaire');
});
Route::prefix('/assessment')->group(function () {
    Route::get('/physical', [AssessmentController::class, 'phyiscal'])->name('physical');
    Route::post('/physical', [AssessmentController::class, 'add_phyiscal'])->name('add.physical');
    Route::post('physical/del', [AssessmentController::class, 'delete_phyiscal'])->name('delete.physical');
    Route::get('/mechanical', [AssessmentController::class, 'mechanical'])->name('mechanical');
    Route::post('/mechanical', [AssessmentController::class, 'add_mechanical'])->name('add.mechanical');
    Route::post('mechanical/del',[AssessmentController::class, 'delete_mechanical'])->name('delete.mechanical');
    Route::get('/update/phy/{id}/{status}', [AssessmentController::class, 'physical_update_status'])->name('physical.update.status');
    Route::get('/update/mach/{id}/{status}', [AssessmentController::class, 'mechanical_update_status'])->name('mechanical.update.status');    
    Route::post('/shair/physical',[AssessmentController::class, 'shair_physical_assessment'])->name('shair.pysical');
    Route::post('/shair/mechanical', [AssessmentController::class, 'shair_mechanical_assessment'])->name('shair.mechanical');
    Route::post('/physical/left-right',[AssessmentController::class,'physical_left_right'])->name('update.left.right.physical');
    Route::post('/mechanical/left-right',[AssessmentController::class,'mechnical_left_right'])->name('update.left_right.mechanical');       
});
    Route::prefix('/files')->group(function () {
        Route::get('/index/{id?}', [FileController::class, 'index'])->name('file');
        Route::post('/index', [FileController::class, 'save_file'])->name('save.file');
        Route::post('/delete', [FileController::class, 'delete_file'])->name('delete.file');
        Route::get('/download/{id}', [FileController::class, 'download_file'])->name('download.file');
    });
    Route::view('admin/dashboard', 'supperadmin.index')->name('dashboard');
});