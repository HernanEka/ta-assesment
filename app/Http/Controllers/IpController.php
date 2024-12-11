<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Riwayat;
use App\Models\Server;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IpController extends Controller
{
    public function index()
    {
        $title = 'Data Ip Address';

        if (request()->query('search')) {

            $search = request()->query('search');

            $server = Server::where('hostname', 'like', '%' . $search . '%')->first();

            if ($server != null) {
                $ip = IP::where('ip_address', 'like', '%' . $search . '%')->orWhere('server_id', '=', $server->id)->where('tipe', '=', 'user')->get();
            }
            else{
                $ip = IP::where('ip_address', 'like', '%' . $search . '%')->where('tipe', '=', 'user')->get();
            }

            return view('Data_IP_Address', compact('title', 'ip','search'));
        }

        $ip = IP::where('tipe', '=', 'user')->get();
        return view('Data_IP_Address', compact('title', 'ip'));
    }

    public function addPage()
    {

        $title = 'Input IP Address';
        $server = Server::all();
        return view('Add_IP_Address', compact('title', 'server'));
    }

    public function tambah(Request $request)
    {


        $request->validate([
            'server_id' => 'required',
            'ip' => 'required|ipv4|unique:ips,ip_address'
        ]);

        $ip = new Ip();
        $ip->ip_address = $request->ip;
        $ip->slug = Str::slug('ip') . "-" . Str::random(8);
        $ip->server_id = $request->server_id;
        $ip->save();

        $server = Server::find($request->server_id);

        $riwayat = new Riwayat();
        $riwayat->riwayat = 'Admin <b>'. Auth::user()->name . '</b> menambahkan IP <b>'. $ip->ip_address .'</b> pada server <b>'  . $server->hostname .  '</b>';
        $riwayat->save();

        return redirect('/ip');
    }

    public function delete($slug)
    {

        $ip = IP::where('slug', '=', $slug)->first();

        $ip->delete();

        return redirect()->back();
    }

    public function edit($slug)
    {
        $title = 'Edit IP Address';
        $server = Server::all();
        $ip = IP::where('slug', '=', $slug)->first();
        return view('Edit_IP_Address', compact('title', 'server', 'ip'));
    }

    public function update(Request $request, $slug)
    {

        $ip = IP::where('slug', '=', $slug)->first();

        $riwayat = new Riwayat();
        $riwayat->riwayat = 'Admin <b>'. Auth::user()->name . '</b> melakukan perubahan pada IP <b>'. $ip->ip_address .'</b>';

        $ip->ip_address = $request->ip;
        $ip->server_id = $request->server_id;

        $ip->save();
        $riwayat->save();



        return redirect('/ip');
    }
}
