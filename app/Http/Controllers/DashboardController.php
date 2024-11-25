<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $server = Server::all();
        $title = 'Dashboard Telkom Server';
        return view('Dashboard', compact('title','server'));

    }
}
