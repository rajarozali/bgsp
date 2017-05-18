<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class LangController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function change(Request $request)
    {
        $lang = $request['lang'];
        $langs = ['en', 'ar', 'fr', 'pt'];
        if (in_array($lang, $langs)) {
            \Session::set('lang', $lang);
            return redirect()->back();
        }
    }
}
