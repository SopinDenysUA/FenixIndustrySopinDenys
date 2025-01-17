<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function setLocale($locale): RedirectResponse
    {
        if (in_array($locale, ['en', 'ru', 'uk'])) {
            App::setLocale($locale);
            Session::put(['locale' => $locale]);
        }

        return back();
    }
}
