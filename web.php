<?php

use App\Http\Controllers\DropdownController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 Route::get('home',function(){
    return view('home');
 });
 ## Deshboard

 Route::get('dashboard',[UserController::class,'dashboard'])->name('dashboardPage');
 

  ## Admin Route
 Route::group(['prefix' => 'admin'], function (){
    Route::get('form',[DropdownController::class,'index'])->name('formPage');
    Route::post('store',[RegistrationController::class,'store'])->name('storePage');
    Route::get('table',[RegistrationController::class,'showTable'])->name('showTable');
    Route::get('table-edit /{id}',[RegistrationController::class,'editTable'])->name('editTable');
    Route::put('table-update',[RegistrationController::class,'update'])->name('updateTable');
    Route::get('table-view /{id}',[RegistrationController::class,'view'])->name('viewTable');
    Route::delete('table-destroy /{id}',[RegistrationController::class,'destroy'])->name('destroyTable');

  });

  //Trainer route
  Route::group(['prefix'=> 'trainer'], function(){
        
        Route::get('form',[TrainerController::class,'trainerForm'])->name('trainerForm');
        Route::post('store',[TrainerController::class,'store'])->name('store');
        Route::get('table',[TrainerController::class,'trainerTable'])->name('trainerTable');
        Route::get('edit /{id}',[TrainerController::class,'editTable'])->name('editTableTrainer');
        Route::put('update',[TrainerController::class,'update'])->name('update');
        Route::delete('destroy/{id}',[TrainerController::class,'destroy'])->name('trainerDestroyTable');
  });
// dropdown 
//Route::get('dropdown',[DropdownController::class,'index'])->name('dropdwon-index');
Route::post('api/fatch-state',[DropdownController::class,'fetchState']);
Route::post('api/fatch-city',[DropdownController::class,'fetchCity']);