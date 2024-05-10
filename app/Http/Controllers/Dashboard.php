<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function DashboardRW(){
        return view('rw-login.index');
    }
    public function DashboardRT(){
        return view('rt-login.index');
    }
    public function DashboardWarga(){
        return view('user-login.main');
    }
}
