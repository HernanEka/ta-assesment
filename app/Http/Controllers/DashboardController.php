<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Server;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $server = Server::all();
        $ips = Ip::all();
        $title = 'Dashboard Telkom Server';
        return view('Dashboard', compact('title','server','ips'));

    }
}
