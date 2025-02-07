<?php

namespace Hawkiq\Admlte\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LanguageController extends Controller
{
    public $expire = "30"; // Days

    public function changeLanguage(Request $request, $locale)
    {
        if (!in_array($locale, config('admlte.app_locals'))) {
            $locale = config('app.fallback_locale');
        }

        return redirect()->back()->withCookie(cookie('app_locale', $locale, 60 * 24 * $this->expire));
    }
}