<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \Validator;

class UserController extends Controller
{
    public function registerUser(Request $request){
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

      Auth::attempt($user);
      return redirect('/');
    }

    public function loginUser(Request $request) {

      if (Auth::check()) {
        return redirect('/');
      }

        $credentials = [
          'email' => $request->emailUserLogin,
          'password' => $request->passwordUserLogin
        ];

        $user = User::where('email', $request->emailUserLogin)->first();

        if (Auth::attempt($credentials, true))
        {

          return redirect('/');

        } elseif ($user) {

          $validation = $request->validate([
            'passwordUserLogin'=>'email|numeric'
          ]);

        } else {

          $validation = $request->validate([
            'emailUserLogin'=>'numeric'
          ]);

        }
    }

    public function logOffUser(Request $request){

      if (!Auth::check()) {
        return redirect('/');
      }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
      }

      public function getAllUsers(){
        $users["users"] = User::all();
        return $users;
      }

}
