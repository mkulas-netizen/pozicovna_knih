<?php


use App\Http\Controllers\ArtisanController;
use Illuminate\Support\Facades\Route;

Route::get('seed',[ArtisanController::class,'seed']);
Route::get('migrate',[ArtisanController::class,'migrate']);
Route::get('drop',[ArtisanController::class,'drop']);
