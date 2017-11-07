<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;

class LanguageController extends Controller
{
    /**
     * Show language when user choose
     *
     * @param string $language language in website
     *
     * @return void
     */
    public function show($language)
    {
        $ll = App::getLocale($language);
        // dd($ll);
        Cookie::queue('locale', $language, config('cookie.lifetime'));

        return redirect(url(URL::previous()));
    }
}
