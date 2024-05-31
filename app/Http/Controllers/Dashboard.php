<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function DashboardRW(){
        return view('rw-login.index', ['activeMenu' => 'dashboard']);
    }
    public function DashboardRT(){
        return view('rt-login.index', ['activeMenu' => 'dashboard']);
    }
    public function DashboardWarga(){
        return view('user-login.main');
    }
}
