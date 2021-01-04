<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    function registerUser(Request $request){

      // $validacoes = $request->validate([
      //   'registerName' => 'required|min:6',
      //   'registerEmail' => 'required|email|unique:users',
      //   'registerPassword' => 'required|lte:registerPasswordConfirmation|min:6'
      // ]);
      // dd($request);
      $user = new User();
      $user->name = $request->registerName;
      $user->email = $request->registerEmail;
      $user->password = Hash::make($request->registerPassword);

      echo $user->name;
      echo $user->email;
      echo $user->password;
      $user->save();

      if (Auth::attempt(["email"=>$request->email,"password"=>$request->senha]))
      { return redirect('/'); }
    }

    function loginUser(Request $request){
        if (Auth::check()) {
          return redirect('/');
        }
        if (Auth::attempt([ "email"=>$request->email, "password"=>$request->senha]))
          {
            // return redirect('/');
            echo "ok";
          }
      }
}
