<?php

use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::resource(name:'courses',controller:CourseController::class);


// Route::group(attributes:['prefix' => 'courses','as' => 'course.'], routes:function(){
//     Route::get('/', [CourseController::class, 'index'])->name(name: 'index');
//     Route::get('/create', [CourseController::class, 'create'])->name(name: 'create');
//     Route::post('/create', [CourseController::class, 'store'])->name(name: 'store');
//     Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name(name: 'destroy');
//     Route::get('/edit/{course}', [CourseController::class, 'edit'])->name(name: 'edit');
//     Route::put('/update/{course}', [CourseController::class, 'update'])->name(name: 'update');
// });