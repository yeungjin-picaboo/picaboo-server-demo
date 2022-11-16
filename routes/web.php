<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/regist', [RegisterUserController::class, 'create'])
->name('hi')
;
Route::post('/regist',[RegisterUserController::class, 'store']);

Route::get('/login', [LoginUserController::class, 'index']);
Route::post('/login', [LoginUserController::class, 'authenticate']);