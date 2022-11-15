<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'string','min:8' ,'max:30'],
            'password' => ['required', 'string', 'min:8','current_password'],    //! 수정해야됨
            'name' => ['required', 'string', 'max:30'],
            'user_nickname' => ['required', 'string', 'max:30','unique:users,user_nickname'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,user_email'], //! 수정해야됨
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_phnum' => ['required', 'string', 'min:30','unique:users,user_phnum'], //! 수정해야됨
        ]);

        $user = User::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'user_nickname' => $request->user_nickname,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
