<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
class HomeController extends BaseController
{
    public function index(){
         if (auth()->check()) {
        return redirect()->back();
        }
        return redirect()->route('login');
    }

    public function dashboard_admin(){
        return view('dashboard.admin');
    }

    public function dashboard_user(){
        return view('dashboard.user');
    }
}
