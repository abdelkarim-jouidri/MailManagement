<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'login' => ['required'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard')->withErrors([
    //             'success-login' => 'Success Login.',
    //         ]);
    //     }

    //     return back()->withErrors([
    //         'login' => 'Les informations d’identification fournies ne correspondent pas à nos dossiers.',
    //     ]);
    // }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5'],
        ]);

      
        if(Auth::attempt($credentials))

        {
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'login' => 'Les informations d’identification fournies ne correspondent pas à nos dossiers.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
