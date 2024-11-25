<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Server;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IpController extends Controller
{
    public function index() {

        $title = 'Data Ip Address';
        $ip = IP::where('tipe', '=', 'user')->get();
        return view('Data_IP_Address', compact('title', 'ip'));

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
        $ip->slug = Str::slug('ip') . "-" . Str::random(8);
        $ip->server_id = $request->server_id;
        $ip->save();

        return redirect('/ip');
    }

    public function delete($slug){

        $ip = IP::where('slug', '=', $slug)->first();

        $ip->delete();

        return redirect()->back();

    }

    public function edit($slug){
        $title = 'Edit IP Address';
        $server = Server::all();
        $ip = IP::where('slug', '=', $slug)->first();
        return view('Edit_IP_Address', compact('title', 'server','ip'));
    }

    public function update(Request $request, $slug){

        $ip = IP::where('slug', '=', $slug)->first();

        $ip->ip_address = $request->ip;
        $ip->server_id = $request->server_id;

        $ip->save();

        return redirect('/ip');

    }
}
