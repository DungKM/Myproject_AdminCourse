<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', action: [StudentController::class,'index']);
Route::get('/create', action: [StudentController::class,'create'])->name('create');
Route::post('/create', action: [StudentController::class,'store'])->name('store');
