<?php


use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LangController;
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

Route::get('/',function (){
   return view('standard.pages.home');
});

Route::resource('author',AuthorController::class);
Route::resource('book',  BookController::class);



Route::get('lang/{lang}', [LangController::class, 'setLanguage']);



