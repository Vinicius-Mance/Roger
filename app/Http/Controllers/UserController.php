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
        return redirect('/');
      }

      // $request->userProfilePic->store('img', 'public');
      // return "uploaded";

      $validacoes = $request->validate([
        'registerName' => 'required|min:6|regex:/^[a-zA-Z0-9\s]+$/',
        'registerEmail' => 'required|email|unique:users,email',
        'registerPassword' => 'required|lte:registerPasswordConfirmation|min:6'
      ]);

      $user = new User();
      $user->name = $request->registerName;
      $user->email = $request->registerEmail;
      $user->password = Hash::make($request->registerPassword);
      $user->save();

      $credentials = [
        'email' => $request->registerEmail,
        'password' => $request->registerPassword
      ];

      if (Auth::attempt($credentials, true))
      {
        return redirect('/');
      }
      return redirect('/login');
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
        return redirect('/login');
      }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

      }

      public function getAllUsers() {
        $users["users"] = User::all();
        return $users;
      }

}
