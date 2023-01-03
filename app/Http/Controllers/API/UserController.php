<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function fetchUsers(){
        return User::all();
    }
    //
    public function currentUserInfo()
    {
        return response()->json([
            'user_nickname' => Auth::user()->user_nickname,
            'permission' => Auth::user()->permission
        ], Response::HTTP_OK);
    }
}
