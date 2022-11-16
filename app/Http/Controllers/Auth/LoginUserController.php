<?php
declare(strict_types=1);
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginUserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials =  validator($request->only('user_id' , 'password'),[
            'user_id'=>'required|string|max:255|',
            'password'=>'required|string|min:5',
        ]);
        // Log::info($credentials);

        $credentials = request()->only('user_id', 'password');

        Log::info($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        // if (Auth::attempt($credentials)) {
        //     $request->session()->put('key',$credentials['user']);
        //     return $this->requestResponder->response(true,"login" , "user");
        // }

        return back()->withErrors(
            [
                'message' => '메일주소 또는 비밀번호가 올바르지 않습니다.',
            ]
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(RouteServiceProvider::HOME);
    }
}
