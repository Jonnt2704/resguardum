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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/subline/index', function () {
    return view('admin.subline.index');
});

Route::get('/admin/subline/index', [App\Http\Controllers\sublineTopicController::class, 'index'])->name('index');
Route::get('/admin/subline/add', [App\Http\Controllers\sublineTopicController::class, 'list'])->name('list');
Route::post('/admin/create-subline-topic', [App\Http\Controllers\sublineTopicController::class, 'store']);
Route::get('/admin/subline/edit/{id}', [App\Http\Controllers\sublineTopicController::class, 'edit']);
Route::post('/admin/update-subline-topic/{id}', [App\Http\Controllers\sublineTopicController::class, 'update']);
Route::get('/admin/deleteSubLine-topic/{id}', [App\Http\Controllers\sublineTopicController::class, 'destroy']);




