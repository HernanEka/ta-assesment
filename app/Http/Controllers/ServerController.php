<?php

namespace App\Http\Controllers;

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
}
