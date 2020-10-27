<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function swap($lang){
        // Almacenar el lenguaje en la session
        if(array_key_exists($lang, config('languages'))){
            session()->put('applocate', $lang);
        }
        return back();
    }
}

