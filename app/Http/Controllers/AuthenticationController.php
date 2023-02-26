<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //création d'un compte
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $credentials = $request->validate(
            [
                'name'=>'required|string|min:3',
                'email'=>'required|email',
                'password'=>'required|confirmed'
            ]
            );
        User::create($credentials);
        return redirect('/');
    }

    //connexion d'un utilisateur
    public function login(){
        return view('users.login');

    }



    public function authenticate(Request $request){

        $credentials = $request->validate(
            [
                'name'=>'required|min:3',
                'password'=>'required'
            ]
            );

        if(!Auth::attempt($credentials)){
            return back()->withErrors(['error'=>"nom d'utilisateur ou mot de passe invalide"]);
        }

        $request->session()->regenerate();
        return redirect('/');
    }

    //déconnexion d'un utilisateur
    public function logout(Request $request){
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
