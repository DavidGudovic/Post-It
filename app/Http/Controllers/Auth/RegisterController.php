<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class RegisterController extends Controller
{
    public function index(){
      return view('auth.register');
    }

    public function store(Request $request){
      //validate
      $this->validate($request, [
        'username' => 'required|max:40',
        'email' => 'required|email|max:244',
        'name' => 'required|max:40',
        'lastname' => 'required|max:40',
        'password' => 'required|confirmed',
      ]);

      //add to database
      User::create([
        'name' => $request-> name,
        'username' => $request-> username,
        'email' => $request-> email,
        'password' => Hash::make($request->password),
      ]);

      //sign in
      auth()->attempt($request->only('email', 'password'));
      //redirect
      return redirect()->route('dashboard');
    }
}
