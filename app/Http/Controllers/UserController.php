<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('Login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function data(){

        $user = User::all();
        $title = 'Data User';

        return view('Data_User', compact('user','title'));

    }

    public function add(){

        $title = 'Tambah user';
        return view('Add_User', compact('title'));

    }

    public function tambah(Request $request){

        $request->validate([

            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required'

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->slug = Str::random(10);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users');


    }

    public function edit($slug){

        $user = User::where('slug','=',$slug)->first();
        $title = 'Edit User';

        return view('Edit_User', compact('title','user'));

    }

    public function update(Request $request,$slug){

        $user = User::where('slug','=',$slug)->first();

        $user->name = $request->name;
        $user->email = $request->email;

        if (isset($request->password)) {
            $user->password = Hash::make($request->passsword);
        }
        $user->save();

        return redirect('/users');

    }

    public function delete($slug){

        $user = User::where('slug','=',$slug);

        $user->delete();

        return redirect('/users');

    }
}
