<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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
   return view('pages.home');
});

Route::resource('author',AuthorController::class)
    ->except([ 'edit' , 'create' , 'update' ]);


Route::resource('book',  BookController::class)
    ->except([ 'edit' , 'create' ]);

