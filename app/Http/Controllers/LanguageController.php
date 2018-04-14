<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    public function changeLanguage($lang) {
        session(['lang' => $lang]);

        return redirect()->back();
    }
}
