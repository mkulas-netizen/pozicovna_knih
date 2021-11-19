<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

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
