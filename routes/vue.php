<?php

use Illuminate\Support\Facades\Route;

Route::get('vue/{any?}', function () {
    return view('vue.vue');
})->where('any', '.*')->name('vue');
