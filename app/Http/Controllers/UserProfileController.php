<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\CompareOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    public function show()
    {

        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            // CompareOldPassword => rule to verify password
            'old_password' => ['required',new CompareOldPassword],
            'new_password' => ['required','min:5','different:old_password'],
            'confirm_password' => ['required','min:5','same:new_password'],

        ]);

        $user = Auth::user();

       DB::table('users')
       ->where('id',$user->id)
       ->update(['password'=>Hash::make($request->new_password)]);
        return back()->with('succes', 'Password succesfully updated');
    }

    // show all users
    public function showAllUsers(){
        $users =DB::table('users')
        ->join('profils', 'users.profil_id', '=', 'profils.id')
        ->join('fonctions', 'users.fonction_id', '=', 'fonctions.id')
        ->select('users.*', 'profils.name as profil','fonctions.name as fonction')
        ->where('users.id','!=',Auth::id())
        ->get();
        return view('pages.user-management',['users'=>$users]);
    }
    public function changerRole($id,$is_admin){
       $user=User::find($id);

       if($is_admin==0){

        $user->is_admin=1;
       }else{
        $user->is_admin=0;

       }
       $user->save();

       return back()->with('succes_role', 'Role succesfully changed');
    }
}
