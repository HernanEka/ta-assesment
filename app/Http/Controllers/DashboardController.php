<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Riwayat;
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

    public function riwayat(){
        $riwayat = Riwayat::orderBy('created_at', 'desc')->get();
        $title = 'Data Riwayat';

        return view('Data_Riwayat', compact('riwayat','title'));

    }
}
