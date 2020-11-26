<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function registerUser(Request $req){

      $validacoes = $req->validate([
        'nome' => 'required|min:6',
        'email' => 'required|email|unique:users',
        'senha' => 'required|lte:confirmar|min:6'
      ]);

      $user = new User();
      $user->nome  = $req->nome;
      $user->email = $req->email;
      $user->senha = Hash::make($req->senha);
      $user->save();

      if (Auth::attempt(["email"=>$req->email,"password"=>$req->senha]))
      { return redirect('/'); }
    }

    function login(Request $request){
        if (Auth::check()) {
          return redirect('/perfil');
        }
        if (Auth::attempt([ "email"=>$request->email, "password"=>$request->senha]))
          { return redirect('/'); }
        else {
          $validacoes = $request->validate([
            'email'=>'min:99999']);
          return redirect('/login');}
      }
}
