<?php

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

Route::get('/', [App\Http\Controllers\Controller::class, 'index']);

Route::get('/main', [App\Http\Controllers\Controller::class, 'mainList']);
Route::get('/project-per-autor', [App\Http\Controllers\Controller::class, 'autorList']);
Route::get('/project-per-year', [App\Http\Controllers\Controller::class, 'project_per_year']);
Route::get('/project-per-tutor', [App\Http\Controllers\Controller::class, 'tutorList']);
Route::get('/mainYears/{year}', [App\Http\Controllers\Controller::class, 'mainList_years']);

Route::get('/projects/{type}/{id}', [App\Http\Controllers\Controller::class, 'project_result']);

Route::get('/single/project/{id}', [App\Http\Controllers\Controller::class, 'single_project_page']);

Route::get('/download/{filename}', [App\Http\Controllers\Controller::class, 'downloadProject'])->name('download');

Route::post('/search-project', [App\Http\Controllers\Controller::class, 'find_project']);

Route::get('/query-ia', [App\Http\Controllers\Controller::class, 'ayuda_ia']);


Route::get('/admin', function () {
    return view('admin.index');
})->middleware('auth');

//// USERS CRUD
Route::get('/admin/users/index', [App\Http\Controllers\UsersController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/user/add', [App\Http\Controllers\UsersController::class, 'create']);
Route::post('/admin/create-user', [App\Http\Controllers\UsersController::class, 'store']);
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit']);
Route::post('/admin/update-user/{id}', [App\Http\Controllers\UsersController::class, 'update']);
Route::get('/admin/delete-user/{id}', [App\Http\Controllers\UsersController::class, 'destroy']);

// PROJECTS CRUD
Route::get('/admin/project/index', [App\Http\Controllers\ProjectController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/project/add', [App\Http\Controllers\ProjectController::class, 'create']);
Route::post('/admin/create-project', [App\Http\Controllers\ProjectController::class, 'store']);
Route::get('/admin/project/edit/{id}', [App\Http\Controllers\ProjectController::class, 'edit']);
Route::post('/admin/update-project/{id}', [App\Http\Controllers\ProjectController::class, 'update']);
Route::get('/admin/delete-project/{id}', [App\Http\Controllers\ProjectController::class, 'destroy']);

// LINES CRUD
Route::get('/admin/lines/index', [App\Http\Controllers\LineController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/lines/add', [App\Http\Controllers\LineController::class, 'create']);
Route::post('/admin/create-line', [App\Http\Controllers\LineController::class, 'store']);
Route::get('/admin/line/edit/{id}', [App\Http\Controllers\LineController::class, 'edit']);
Route::post('/admin/update-line/{id}', [App\Http\Controllers\LineController::class, 'update']);
Route::get('/admin/delete-line/{id}', [App\Http\Controllers\LineController::class, 'destroy']);

// SUBLINES CRUD
Route::get('/admin/subline/index', [App\Http\Controllers\subLineController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/subline/add', [App\Http\Controllers\subLineController::class, 'create']);
Route::post('/admin/create-subline', [App\Http\Controllers\subLineController::class, 'store']);
Route::get('/admin/subline/edit/{id}', [App\Http\Controllers\subLineController::class, 'edit']);
Route::post('/admin/update-subline/{id}', [App\Http\Controllers\subLineController::class, 'update']);
Route::get('/admin/delete-subline/{id}', [App\Http\Controllers\subLineController::class, 'destroy']);


// SUB LINES TOPIC CRUD 
Route::get('/admin/subline-topic/index', [App\Http\Controllers\sublineTopicController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/subline-topic/add', [App\Http\Controllers\sublineTopicController::class, 'list'])->name('list');
Route::post('/admin/create-subline-topic', [App\Http\Controllers\sublineTopicController::class, 'store']);
Route::get('/admin/subline-topic/edit/{id}', [App\Http\Controllers\sublineTopicController::class, 'edit']);
Route::post('/admin/update-subline-topic/{id}', [App\Http\Controllers\sublineTopicController::class, 'update']);
Route::get('/admin/delete-subLine-topic/{id}', [App\Http\Controllers\sublineTopicController::class, 'destroy']);


// TUTOR CRUD
Route::get('/admin/tutor/index', [App\Http\Controllers\TutorController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/tutor/add', [App\Http\Controllers\TutorController::class, 'create']);
Route::post('/admin/create-tutor', [App\Http\Controllers\TutorController::class, 'store']);
Route::get('/admin/tutor/edit/{id}', [App\Http\Controllers\TutorController::class, 'edit']);
Route::post('/admin/update-tutor/{id}', [App\Http\Controllers\TutorController::class, 'update']);
Route::get('/admin/delete-tutor/{id}', [App\Http\Controllers\TutorController::class, 'destroy']);


// AUTORES CRUD
Route::get('/admin/autor/index', [App\Http\Controllers\AutorController::class, 'index'])->name('index')->middleware('auth');
Route::get('/admin/autor/add', [App\Http\Controllers\AutorController::class, 'create']);
Route::post('/admin/create-autor', [App\Http\Controllers\AutorController::class, 'store']);
Route::get('/admin/autor/edit/{id}', [App\Http\Controllers\AutorController::class, 'edit']);
Route::post('/admin/update-autor/{id}', [App\Http\Controllers\AutorController::class, 'update']);
Route::get('/admin/delete-autor/{id}', [App\Http\Controllers\AutorController::class, 'destroy']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
