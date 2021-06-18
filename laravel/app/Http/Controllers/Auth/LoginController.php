<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }


    public function register(){
        return view('auth.register');
    }

    public function login(Request $request){

        $this->validateLogin($request);

         if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'estado'=>1])){
            return redirect()->route('citas');
         }else {
            return redirect()->route('view.login')->withErrors(['usuario'=>'Estas credenciales no coinciden con nuestros registros']);

         }


     }



     protected function validateLogin(Request $request){

        $rules = [
            'password' => 'required|string',
            'email' => 'required|email'
        ];

        $customMessages = [
            'required' => 'El :attribute campo es requerido.'
        ];
        $this->validate($request, $rules, $customMessages);

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
