<?php

use Hawkiq\Admlte\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::middleware('admlte.language')->group(function () {
    Route::get('/change-language/{locale}', [LanguageController::class, 'changeLanguage'])
        ->name('admlte.change_language');
});