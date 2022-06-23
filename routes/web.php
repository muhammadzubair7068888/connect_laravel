<?php

use App\Http\Controllers\superadmin\AssessmentController;
use App\Http\Controllers\superadmin\ChatController;
use App\Http\Controllers\superadmin\ExerciseController;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');
Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
//Language Translation
Route::get('email/{template?}', [SettingController::class, 'get_tempalte'])->name('email');
Route::post('/save-email-template/{name}', [SettingController::class, 'saveTemplate'])->name('save-template');

Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
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
});
Route::prefix('/users')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('users');
    Route::get('/new', [UserController::class, 'new_user'])->name('new.user');
    Route::post('add', [UserController::class, 'add_user'])->name('add.user');
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
});
Route::view('admin/dashboard','supperadmin.index')->name('dashboard');