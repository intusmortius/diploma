<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\WorkerController;
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

Route::get('/', [HomeController::class, 'home'])->name("home");
Route::get('/vacancies', [VacancyController::class, 'index'])->name("vacancies");
Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('new-vacancy');
Route::get('/workers', [WorkerController::class, 'index'])->name("workers");
Route::get('/workers/{user}', [WorkerController::class, 'show'])->name('profile');
Route::get('/workers/{user}/edit', [WorkerController::class, 'edit'])->name('workers-edit');
Route::post('/workers/{user}', [WorkerController::class, 'update'])->name('workers-update');
// Route::get('/register', function () {
//     return view("auth.register");
// });
// Route::get('/login', function () {
//     return view("auth.login");
// });
