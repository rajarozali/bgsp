<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
 

        $module_menus = app('App\Http\Controllers\admin\CrudBuilderController')->createMenumodule();
        return view('admin.dashboard')->with(['module_menus' => $module_menus]);
    }
}
