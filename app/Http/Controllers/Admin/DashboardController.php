<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function login()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard.home');
        }

        return view('auth.login');
    }
    public function home()
    {
        return view('dashboard.index');
    }

}

