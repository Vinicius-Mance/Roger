<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function registerUser(Request $request){
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

    function loginUser(Request $request){
        if (Auth::check()) {
          return redirect('/');
        }
        if (Auth::attempt(["email"=>$request->emailUserLogin, "password"=>$request->passwordUserLogin], true))
          {
            return redirect('/');
          }
      }

      function logOffUser(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

      }
}
