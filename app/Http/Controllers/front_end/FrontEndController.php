<?php

namespace App\Http\Controllers\front_end;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class FrontEndController extends Controller
{
    public function index(){
        return view('front_end.index');
    }
    public function newsIndex(){
        return view('front_end.news');
    }
    public function shopIndex(){
        return view('front_end.shop');
    }
    public function contactIndex(){
        return view('front_end.contact');
    }
}
