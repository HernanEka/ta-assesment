<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Server;
use Illuminate\Http\Request;

class IpController extends Controller
{
    public function index() {

        $title = 'Data Ip Address';
        return view('Data_IP_Address', compact('title'));

    }

    public function addPage(){

        $title = 'Input IP Address';
        $server = Server::all();
        return view('Add_IP_Address', compact('title', 'server'));

    }

    public function tambah(Request $request) {


        $request->validate([
            'server_id' => 'required',
            'ip' => 'required|ipv4|unique:ips,ip_address'
        ]);

        $ip = new Ip();
        $ip->ip_address = $request->ip;
        $ip->server_id = $request->server_id;
        $ip->save();

        return redirect('/ip');
    }
}
