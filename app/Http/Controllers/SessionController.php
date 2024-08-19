<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index()
    {
        return view("login");
    }
    function login(Request $request) 
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Email wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(Auth::attempt($infologin)){
            return 'sukses';
        } else {
            return 'gagal';
        }
    }
}
