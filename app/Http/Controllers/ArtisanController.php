<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class ArtisanController extends Controller
{
    public function seed(): RedirectResponse
    {
        Artisan::call('db:seed');
        return redirect()->back();
    }


    public function migrate()
    {
        Artisan::call('migrate');
        return redirect()->back();
    }


    public function drop(){
        Schema::dropIfExists('books');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('migrations');

        return redirect()->back();

    }
}
