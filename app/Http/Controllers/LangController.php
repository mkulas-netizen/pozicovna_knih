<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function setLanguage($lang)
    {
        if (array_key_exists($lang, Config::get('language'))) {
            session(['language' => $lang]);
        }
        return redirect()->back();
    }
}
