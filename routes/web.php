<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('getPost', [TaskController::class, 'index'])->name('getPost');
Route::post('postSubmit', [TaskController::class, 'create'])->name('postSubmit');
Route::post('updateStatus', [TaskController::class, 'update'])->name('updateStatus');
Route::post('deleteTask', [TaskController::class, 'delete'])->name('deleteTask');


