<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        $profil =DB::table('profils')->get();
        $fonction = DB::table('fonctions')->get();
        return view('auth.register',['departement'=>$profil, 'fonctions'=>$fonction]);
    }

    public function store(Request $request)
    {
        
        
        $credentials = $request->validate([
            'login' => 'required|alpha_num:ascii|min:2|unique:users',
            'nom' => 'required|max:255|min:3',
            'prenom' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'profil_id'=>'required',
            'fonction_id'=>'required'

        ]);
        $credentials['password'] = bcrypt($credentials['password']);
        $user = User::create($credentials);
        auth()->login($user);
        
        return redirect('/dashboard');
    }
}
