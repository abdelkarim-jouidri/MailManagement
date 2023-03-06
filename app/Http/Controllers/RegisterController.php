<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

            DB::table('users')->insert([
                'login' =>$credentials['login'],
                'nom' => $credentials['nom'],
                'prenom' => $credentials['prenom'],
                'email' => $credentials['email'],
                'password' => bcrypt($credentials['password']),
                'profil_id'=>$credentials['profil_id'],
                'fonction_id'=>$credentials['fonction_id']

            ]);



            return back()->with('success',"L'utilisateur a été bien enregistré");

        }



    //     $credentials['password'] = bcrypt($credentials['password']);

    //     $user=User::create($credentials);
    //     $user->save();
    //       // dd($credentials['password']);
    //     // dd($credentials);
    //     // dd($user);

    //     // auth()->login($user);

    //     // return redirect('/dashboard');
    // }
}
