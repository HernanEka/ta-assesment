<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index(){

        $title = "Data Server";
        return view("Data_Server", compact('title'));

    }

    public function addPage(){

        $title = "Tambah Server";
        return view('Add_Server', compact('title'));

    }

    public function tambahServer(Request $request){

        $request->validate([

            'hostname' => 'required|min:4',
            'picnik' => 'required|numeric',
            'picname' => 'required|string',
            'ip' => 'required|ipv4'

        ]);

        $server = new Server();

        $server->hostname = $request->hostname;
        $server->picnik = $request->picnik;
        $server->picname = $request->picname;
        $server->services = implode(", ", $request->service);

        $server->save();

        $ip = new Ip();
        $ip->ip_address = $request->ip;
        $ip->tipe = 'Server';
        $ip->server_id = $server->id;
        $ip->save();

        return redirect('/server');

    }
}
