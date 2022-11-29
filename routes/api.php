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


Route::prefix('/community')->group(function () {
    Route::get('/',\App\Community\Actions\ShowCommunityAction::class)->name('board.show'); // 모든 게시물 가져오기 및 QueryString에 따라 처리
    // 모든 게시물 가져오기 ...
    Route::get('/{id}',\App\Community\Actions\ViewCommunityPostAction::class);

    Route::middleware(['auth:api'])->group(function () {
        Route::post('/', \App\Community\Actions\CreateCommunityAction::class)->name('board.create');
        Route::delete('/{selling_num}',\App\Community\Actions\DeleteCommunityAction::class)->name('board.delete');
        Route::put('/{selling_num}',\App\Community\Actions\UpdateCommunityAction::class)->name('board.put');
    }
    );
});

Route::prefix('/qna')->group(function () {
    Route::get('/', \App\Question\Actions\ShowQuestionAction::class)->name('question.show');
    Route::prefix('/search')->group(function () {
        Route::get('/title', \App\Question\Actions\SearchQuestionAction::class);
        Route::get('/user', \App\Question\Actions\SearchQuestionUserAction::class);
    });

    Route::middleware(['auth:api'])->group(function () {
        Route::post('/', \App\Question\Actions\CreateQuestionAction::class)->name('question.create');
        Route::delete('/{question_num}', \App\Question\Actions\DeleteQuestionAction::class)->name('question.delete');
        Route::put('/{question_num}', \App\Question\Actions\UpdateQuestionAction::class);


    }
    );
}
);

Route::prefix('/comment')->group(function (){
    Route::get('/{post_id}',\App\Comment\Actions\ShowCommentAction::class); // 모든 댓글 데이터 가져오기
    Route::middleware(['auth:api'])->group(function (){
        Route::post('/',\App\Comment\Actions\CreateCommentAction::class); // 댓글 작성
        Route::put('/{post_id}',\App\Comment\Actions\UpdateCommentAction::class);// 댓글 수정
        Route::delete('/{post_id}',\App\Comment\Actions\DeleteCommentAction::class);// 댓글삭제
    });


});

//Route::prefix('/answer')->group(function () {
//    Route::middleware(['auth:api'])->group(function () {
//        Route::post('/write/{question_num}', \App\Answer\Actions\CreateAnswerAction::class)->name('answer.create');
//        Route::delete('/delete/{question_num}', \App\Answer\Actions\DeleteAnswerAction::class)->name('answer.delete');
//        Route::put('/put/{question_num}',\App\Answer\Actions\UpdateAnswerAction::class);
//
//    }
//    );
//});
