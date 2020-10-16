<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\models\User;
class AuthController extends Controller
{
     public function login(Request $request){
         return view('admin.pages.auth.login');
     }

     public function loginuser(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required',
        ]);

        if(!auth()->attempt($validatedData)){
            return back()->withErrors(['error' => 'Wrong Credentials']);
        }
        else{

            return redirect()->route('dashboard');
        }

     }


     public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }


      public function change_password(Request $request , $id){
        $user = User::findOrFail($id);
        return view('admin.pages.accounts.change_password' , compact('user'));
      }


      public function change_password_post(Request $request , $id){
          $password = $request->input('password');
          $user = User::findOrFail($id);
          $user->password = Hash::make($password);
          $user->save();
          return redirect()->back()->with('success','Password changed successfully');
      }

}
