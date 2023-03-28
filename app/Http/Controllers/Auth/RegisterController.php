<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {

        //MODIFICAR REQUEST
        $request->request->add(['username' => Str::slug($request->username)]);

        //VALIDACION
        $this->validate($request, [
            'name' => 'required|min:4',
            'username' => 'required|unique:users|min:3',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        //Autenticar

        Auth()->attempt($request->only('email' , 'password'));

       //REDIRECCONAR
       return redirect()->route('posts.index', auth()->user()->username);
    }
}
