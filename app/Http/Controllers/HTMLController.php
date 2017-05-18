<?php

namespace App\Http\Controllers ;

use Request;

class HTMLController extends Controller
{
    public function index(Request $request)
    {
        return view('html_template/main',['file_name'=>Request::segment(2)]);
    }

}
