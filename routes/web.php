<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/tasks');
});

Route::get('/tasks', [TaskController::class, 'showAll']);
Route::post('/tasks', [TaskController::class, 'create']);
Route::get('/tasks/completed', [TaskController::class, 'showCompleted']);
Route::get('/tasks/incomplete', [TaskController::class, 'showIncomplete']);
Route::get('/tasks/{id}', [TaskController::class, 'showDetail']);
Route::put('/tasks/{id}', [TaskController::class, 'updateData']);
Route::delete('/tasks/{id}', [TaskController::class, 'delete']);
Route::put('/tasks/{id}/status', [TaskController::class, 'updateStatus']);
