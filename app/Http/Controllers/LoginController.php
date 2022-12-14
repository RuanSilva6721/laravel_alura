<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', ['mensagemSucesso' => null]);
    }

    public function store(Request $request){
        if(!Auth::attempt($request->all())){
            return redirect()->back()->withErrors(['Usuário ou senha inválidos!']);
        }
    }
}
