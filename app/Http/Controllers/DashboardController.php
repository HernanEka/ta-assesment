<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $title = 'Dashboard Telkom Server';

        return view('Dashboard', compact('title'));

    }
}
