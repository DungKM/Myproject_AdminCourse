<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::resource('courses', CourseController::class)->except([
    'show',
]);
Route::get('courses/api', [CourseController::class, 'api'])->name('courses.api');
// Route::group(attributes:['prefix' => 'courses','as' => 'courses.'], routes:function(){
//     Route::get('/', [CourseController::class, 'index'])->name(name: 'index');
//     Route::get('/create', [CourseController::class, 'create'])->name(name: 'create');
//     Route::post('/create', [CourseController::class, 'store'])->name(name: 'store');
//     Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name(name: 'destroy');
//     Route::get('/edit/{course}', [CourseController::class, 'edit'])->name(name: 'edit');
//     Route::put('/update/{course}', [CourseController::class, 'update'])->name(name: 'update');
// });

// Route::get('/', [CourseController::class, 'index'])->name(name: 'courses.index');
//     Route::get('courses/create', [CourseController::class, 'create'])->name(name: 'courses.create');
//     Route::post('courses/create', [CourseController::class, 'store'])->name(name: 'courses.store');
//     Route::delete('courses/destroy/{course}', [CourseController::class, 'destroy'])->name(name: 'courses.destroy');
//     Route::get('courses/edit/{course}', [CourseController::class, 'edit'])->name(name: 'courses.edit');
//     Route::put('courses/update/{course}', [CourseController::class, 'update'])->name(name: 'courses.update');