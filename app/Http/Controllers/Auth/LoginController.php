<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  public function index(){
    return view('auth.login');
  }

  public function store(Request $request){
    //validate
    $this->validate($request, [
      'email' => 'required|email|max:244',
      'password' => 'required',
    ]);

    if(!auth()->attempt($request->only('email','password'), $request->remember)){
      return back()->with('status','Invalid login details');
    }

    return redirect()->route('dashboard');
  }
}
