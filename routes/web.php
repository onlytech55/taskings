<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::middleware('auth')->group(function () {
    
    Route::resource('tasks', TasksController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/tasks', [App\Http\Controllers\TasksController::class, 'index'])->name('tasks');
// Route::get('/tasks/create', [App\Http\Controllers\TasksController::class, 'create'])->name('add-tasks');

Route::get('tasks.listar', [TasksController::class, 'index'])->name('tasks.index');
// Route::get('/tasks/listar', [TasksController::class, 'index'])->name('tasks.index');

Route::post('tasks.show', [TasksController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{tasks}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
// Route::put('tasks.{tasks}.actualizar', [TasksController::class, 'update'])->name('tasks.update')->middleware('auth');
// Route::put('/tasks/{tasks}/actualizar', [TasksController::class, 'update'])->name('tasks.update');
// Route::put('tasks.{tasks}.actualizar', [TasksController::class, 'update'])->name('tasks.update');
Route::put('/tasks/{tasks}/actualizar', [TasksController::class, 'update'])->name('tasks.update');


Route::delete('/tasks/{tasks}/eliminar', [TasksController::class, 'destroy'])->name('tasks.destroy');
Route::put('/tasks/{tasks}/finalizar', [TasksController::class, 'completed'])->name('tasks.completed');







