<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//}); api.php 라서 api 가 자체적으로 붙음
// rootUrl/api/register

Route::get('/hello',function (){
   Log::info("hello");
});

Route::prefix('/user')->group(function () {
    Route::post('/register', [\App\Http\Controllers\API\AuthController::class, 'register'])->name('user.register');
    Route::post('/login', [\App\Http\Controllers\API\AuthController::class, 'login'])->name('user.login');
    Route::post('/token-refresh', [\App\Http\Controllers\API\AuthController::class, 'tokenRefresh'])->name('user.token-refresh');

    //인증 처리가 된 부분
    Route::middleware('auth:api')->group(function () {
        Route::get('/info', [\App\Http\Controllers\API\UserController::class, 'currentUserInfo'])->name('user.info');
        Route::get('/all', [\App\Http\Controllers\API\UserController::class, 'fetchUsers'])->name('user.fetch-user');
    });
});


//Route::prefix('/board')->group(function () {
//    Route::middleware(['auth:api'])->group(function () {
//        Route::post('/write', \App\SellingBoard\Actions\CreateSellingBoardAction::class)->name('board.create');
//        Route::delete('/delete/{selling_num}',\App\SellingBoard\Actions\DeleteSellingBoardAction::class)->name('board.delete');
//        Route::put('/put/{selling_num}',\App\SellingBoard\Actions\UpdateSellingBoardAction::class)->name('board.put');
//    }
//    );
//});

Route::prefix('/qna')->group(function () {
//    Route::middleware(['auth:api'])->group(function () {
        Route::post('/create', \App\Question\Actions\CreateQuestionAction::class)->name('question.create');
        Route::delete('/delete/{question_num}', \App\Question\Actions\DeleteQuestionAction::class)->name('question.delete');
        Route::put('/put/{question_num}',\App\Question\Actions\UpdateQuestionAction::class);


//        Route::prefix('/search')->group(function (){
//        Route::post('/title',\App\Question\Actions\SearchQuestionAction::class);
//        Route::post('/user',\App\Question\Actions\SearchQuestionUserAction::class);
//        });


    }
//    );
//}
);

//Route::prefix('/answer')->group(function () {
//    Route::middleware(['auth:api'])->group(function () {
//        Route::post('/write/{question_num}', \App\Answer\Actions\CreateAnswerAction::class)->name('answer.create');
//        Route::delete('/delete/{question_num}', \App\Answer\Actions\DeleteAnswerAction::class)->name('answer.delete');
//        Route::put('/put/{question_num}',\App\Answer\Actions\UpdateAnswerAction::class);
//
//    }
//    );
//});
