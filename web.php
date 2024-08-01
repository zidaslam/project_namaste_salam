<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CourseController;
use app\Models\Course;
use Illuminate\Support\Facades\Route;

// 
Route::get('home',[CourseController::class,'index'])->name('course.index');
Route::get('course/add',[CourseController::class,'create'])->name('course.edit');
Route::post('course/store',[CourseController::class,'store'])->name('course.store');

// Users
Route::get('create',[AccountController::class,'index'])->name('index');
Route::post('fetch-state',[AccountController::class,'fetchState']);
Route::post('fetch-city',[AccountController::class, 'fetchCity']);

Route::post('save',[AccountController::class, 'save']);
Route::get('list',[AccountController::class, 'list'])->name('list');
Route::get('edit/{id}',[AccountController::class, 'edit'])->name('edit');
Route::post('edit/{id}',[AccountController::class, 'update']);