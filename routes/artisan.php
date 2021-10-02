<?php


use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('seed',[HomeController::class,'seed']);
Route::get('migrate',[HomeController::class,'migrate']);
