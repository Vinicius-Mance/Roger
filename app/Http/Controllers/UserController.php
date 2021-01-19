<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function registerUser(Request $request){
      if (Auth::check()) {
        echo "volta patrão";
        die();
      }
      $validacoes = $request->validate([
        'registerName' => 'required|min:6',
        'registerEmail' => 'required|email|unique:users,email',
        'registerPassword' => 'required|lte:registerPasswordConfirmation|min:6'
      ]);
      $user = new User();
      $user->name = $request->registerName;
      $user->email = $request->registerEmail;
      $user->password = Hash::make($request->registerPassword);
      $user->save();
      return redirect('/');
    }

    public function loginUser(Request $request){
        if (Auth::check()) {
          return redirect('/');
        }
        if (Auth::attempt(["email"=>$request->emailUserLogin, "password"=>$request->passwordUserLogin], true))
          {
            return redirect('/');
          }
      }

      public function logOffUser(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

      }

      public function getAllUsers(){
        $users["users"] = User::all();
        return $users;
      }

      public function getUserById($id){
        $user["user"] = User::findOrFail($id);
        return $user;
      }
}
