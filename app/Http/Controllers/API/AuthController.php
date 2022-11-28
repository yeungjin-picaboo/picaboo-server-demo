<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\Client;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    // 회원가입
    public function register(Request $request)
    {
        Log::info($request);
        $valid = validator($request->only('email', 'name', 'password','user_nickname','user_phnum'),[
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'user_nickname' => 'required|string|unique:users',
            'user_phnum' => 'required|string|unique:users',
        ]);

        if($valid->fails()){
            return response()->json([
                'error' => $valid->errors()->all()
            ], Response::HTTP_BAD_REQUEST);
        }

        //data 생성
        $data = request()->only('email', 'name', 'password','user_nickname','user_phnum');

        //사용자 생성
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'user_nickname' => $data['user_nickname'],
            'user_phnum' => $data['user_phnum'],
        ]);
        //passport_client 값이 1인것 가져오기
        $client = Client::where('password_client', 1)->first();

        $http = new \GuzzleHttp\Client();

        $getTokenGenerateRoute = route('passport.token');
//        dd($getTokenGenerateRoute);

//        $response = $http->post($getTokenGenerateRoute, [
//            'form_params' => [
//                'grant_type' => 'password',
//                'client_id' => $client->id,
//                'client_secret' => $client->secret,
//                'username' => $data['email'],
//                'password' => $data['password'],
//                'scope' => '',
//            ]
//        ]);
//
//        $tokenResponse = json_decode((string) $response->getBody(), true);
//        //생성된 사용자랑 토근값을 넣어주고, 201로 create
//        return response()->json([
//            'user' => $user,
//            'token' => $tokenResponse
//        ], Response::HTTP_CREATED);
        $data = [
            'grant_type' => 'password',
            'client_id' => $client['id'],
            'client_secret' => $client['secret'],
            'username' => $data['email'],
            'password' => $data['password'],
            'scope' => '*',
        ];
        $request = Request::create('/oauth/token', 'POST', $data);
        $response = app()->handle($request);
        return $response;
//        $response = app()->handle($request);
//        return response()-> json([
//            'user' => $user,
//            'token' => $response
//        ], Response::HTTP_CREATED);
    }

    // 로그인
    public function login(Request $request)
    {
        Log::info("123", (array)"$request->email");
        Log::info("123123");

        $loginCredential = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
        Log::info('email');

        if(!Auth::attempt($loginCredential)){
            return response()->json([
                'message' => '유효하지 않은 로그인 정보입니다.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        //data 생성
        $data = request()->only('email', 'password');
//
//        //passport_client 값이 1인것 가져오기
        $client = Client::where('password_client', 1)->first();

        $http = new \GuzzleHttp\Client();
//
        $getTokenGenerateRoute = route('passport.token');
//        //라우트앤드포인트가 auth/token 이라 계속 사용하면 됨
//
//        Log::info($data['email']);
//        Log::info("Sibal ", (array)"$client");
//            $response = $http->post($getTokenGenerateRoute, [
//                'form_params'=>[
//                'grant_type' => 'password',
//                'client_id' => $client->id,
//                'client_secret' => $client->secret,
//                'username' => $data['email'],
//                'password' => $data['password'],
//                'scope' => '',
//                ]
//        ]);
//
//            return $response->json();

        $data = [
            'grant_type' => 'password',
            'client_id' => $client['id'],
            'client_secret' => $client['secret'],
            'username' => $data['email'],
            'password' => $data['password'],
            'scope' => '*',
        ];
        $request = Request::create('/oauth/token', 'POST', $data);
        $response = app()->handle($request);
        return $response;
//        $response = app()->handle($request);
//        return response()-> json([
//            'user' => Auth::user(),
//            'token' => $response
//        ], Response::HTTP_CREATED);
//        $tokenResponse = json_decode((string) $response->getBody(), true);
//        //생성된 사용자랑 토근값을 넣어주고, 201로 create
//        return response()->json([
//            'user' => Auth::user(), //인증된 사용자의 값
//            'token' => "hi"
//        ], Response::HTTP_CREATED);
    }
    //리프레시 토큰을 받아서 액세스 토큰 새로고침
    public function tokenRefresh(Request $request)
    {
        Log::info((string)$request);
        $userRequest = validator($request->only('refresh_token'),[
                'refresh_token' => 'required|string',
            ]
        );

        //유효성 검사
        if($userRequest->fails()){
            return response()->json([
                'error' => $userRequest->errors()->all()
            ], Response::HTTP_BAD_REQUEST);
        }

        $data = request()->only('refresh_token');

        //passport_client 값이 1인것 가져오기
        $client = Client::where('password_client', 1)->first();

        $getTokenGenerateRoute = route('passport.token');
        Log::info("data is ",$data);
        $data = [
            'grant_type' => 'refresh_token',
            'client_id' => $client->id,
            'client_secret' => $client->secret,
            'refresh_token' => $data['refresh_token'],
            'scope' => '',
        ];
//        $response = Http::asForm()->post($getTokenGenerateRoute, [
//            'grant_type' => 'refresh_token',
//            'client_id' => $client->id,
//            'client_secret' => $client->secret,
//            'refresh_token' => $data['refresh_token'],
//            'scope' => '',
//        ]);

        $tokenResponse = $data;

        Log::info($tokenResponse);
        Log::info(\response()->json());
        if(isset($tokenResponse['error'])){
            return response()->json([
                'message' => 'token Error',
                'error' => $tokenResponse['error'],
            ], Response::HTTP_UNAUTHORIZED);
        } else {
            return response()->json([
                'message' => '토큰 재발행 success',
                'token' => $tokenResponse
            ], Response::HTTP_OK);
        }
    }
}
