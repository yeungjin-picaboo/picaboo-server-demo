<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('regist');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
    }
}
