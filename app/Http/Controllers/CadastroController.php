<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroController extends Controller
{
    public function create()
    {
        return view('auth.Cadastro');
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('login.index');
    }
}
