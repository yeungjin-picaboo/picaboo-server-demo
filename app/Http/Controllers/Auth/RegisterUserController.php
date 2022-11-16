<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function create(){
        return view('regist'); //? 처음 띄워주는 화면
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'string','min:8' ,'max:30'],
            'password' => ['required', 'string', 'min:8'],    //! 수정해야됨
            'name' => ['required', 'string', 'max:30'],
            'nickname' => ['required', 'string', 'max:30','unique:users,user_nickname'], 
            'user_email' => ['required', 'string', 'max:255', 'unique:users,user_email'], //! 수정해야됨
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_phnum' => ['required', 'string', 'min:8','unique:users,user_phnum'], //! 수정해야됨
        ]);

        $user = User::create([
            'user_id' => $request->user_id,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'user_nickname' => $request->nickname,
            'user_email' => $request->user_email,
            'user_phnum' => $request->user_phnum,
        ]);
        return view('hi',compact('user')); //? 2번째로 띄워주는 화면 -> 같은 url
        // 화면을 띄워준 후 데이터 전달.
    }
}
