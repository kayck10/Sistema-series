<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user = [
          'email' =>  $request->email,
           'password' => $request->password
        ];
        if (!Auth::attempt($user)) {
            return redirect()->back()->withErrors('Usuário ou senha inválidos');
        }
        return redirect()->route('series.index');
    }

    public function destroy () {
        Auth::logout();

        return redirect()->route('login.index');
    }
}
