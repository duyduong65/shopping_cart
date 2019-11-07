<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    function setLang(Request $request)
    {
        $locale = $request->language;
//        dd($locale);
        Session::put('language',$locale);
        return back();
    }
}
