<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\CompareOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\Debugbar\Facades\Debugbar;


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

    public function deleteUser(User $user){
        $user->delete();
        return back()->with("delete","utitlisateur a été bien supprimé");
    }

    public function showUpdateForm(User $user){
        // Debugbar::info($user);
        $departement = DB::table('profils')->get();
        $fonctions = DB::table('fonctions')->get();
        return view('pages.user-update-copy',['user'=>$user, "departement"=>$departement, "fonctions"=>$fonctions]);
    }

    public function updateUser(Request $request , User $user){
        
        // dd($request);
        $fields = $request->validate([
            'login' => 'required|alpha_num:ascii|min:2',
            'nom' => 'required|max:255|min:3',
            'prenom' => 'required|max:255|min:3',
            'email' => 'required|email|max:255',
            'profil_id'=>'required',
            'fonction_id'=>'required',
            'new_password' => ['nullable','min:5','different:old_password'],
            'confirm_password' => ['nullable','min:5','same:new_password'],
        ]);

        $user->update($fields);
        return back();
    }
}
