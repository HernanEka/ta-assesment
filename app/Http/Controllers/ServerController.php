<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Server;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    public function index()
    {
        if (request()->query('search') != null) {
            $search = request()->query('search');

            $server = Server::withCount('ips')->where('hostname', 'like', '%' . $search . '%')->orWhere('picnik', 'like', '%' . $search . '%')->orWhere('picname', 'like', '%' . $search . '%')->orWhere('services', 'like', '%' . $search . '%')->get();

            $title = 'Data Server';
            return view('Data_Server', compact('server', 'search', 'title'));
        }

        $server = Server::withCount('ips')->get();
        $title = "Data Server";
        return view("Data_Server", compact('title', 'server'));
    }

    public function addPage()
    {

        $title = "Tambah Server";
        return view('Add_Server', compact('title'));
    }

    public function tambahServer(Request $request)
    {

        $request->validate([

            'hostname' => 'required|min:4',
            'picnik' => 'required|numeric',
            'picname' => 'required|string',
            'ip' => 'required|ipv4|unique:ips,ip_address'

        ]);

        $server = new Server();

        $server->hostname = $request->hostname;
        $server->slug = Str::slug('Server') . "-" . Str::random(8);
        $server->picnik = $request->picnik;
        $server->picname = $request->picname;
        if ($request->service) {
            $server->services = implode(", ", $request->service);
        }

        $server->save();

        $ip = new Ip();
        $ip->ip_address = $request->ip;
        $ip->tipe = 'Server';
        $ip->slug = Str::slug('IP') . "-" . Str::random(8);
        $ip->server_id = $server->id;
        $ip->save();

        return redirect('/server');
    }

    public function detail($slug)
    {

        $server = Server::where('slug', '=', $slug)->first();
        $ip_server = Ip::where('server_id', '=', $server->id)->where('tipe', '=', 'server')->first();
        $ip_host = Ip::where('server_id', '=', $server->id)->where('tipe', '=', 'user')->get();
        $title = 'Detail Server';
        $services = explode(", ", $server->services);
        return view('Detail_Server', compact('server', 'ip_server', 'ip_host', 'title', 'services'));
    }

    public function edit($slug)
    {

        $server = Server::where('slug', '=', $slug)->first();
        $ip_server = Ip::where('server_id', '=', $server->id)->where('tipe', '=', 'server')->first();
        $title = 'Edit Server';
        $services = explode(", ", $server->services);

        // return $services;
        return view('Edit_Server', compact('server', 'ip_server', 'title', 'services'));
    }

    public function update(Request $request, $slug)
    {
        $server = Server::where('slug', '=', $slug)->first();
        $ip = Ip::where('server_id', '=', $server->id)->where('tipe', '=', 'server')->first();

        $request->validate([

            'hostname' => 'required|min:4',
            'picnik' => 'required|numeric',
            'picname' => 'required|string',
            'ip' => 'required|ipv4|unique:ips,ip_address,' . $ip->id

        ]);

        $server->hostname = $request->hostname;
        $server->slug = Str::slug('Server') . "-" . Str::random(8);
        $server->picnik = $request->picnik;
        $server->picname = $request->picname;
        if ($request->service) {
            $server->services = implode(", ", $request->service);
        } else {
            $server->services = null;
        }
        $server->save();

        if ($ip->ip_address != $request->ip) {
            $ip->ip_address = $request->ip;
        }
        $ip->save();

        return redirect('/server');
    }

    public function delete($slug){

        $server = Server::where('slug', '=', $slug)->first();

        $server->delete();

        return redirect()->back();

    }
}
