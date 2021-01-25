<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\FoldersController;

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

// ユーザーがログインしている場合、処理を実行する
Route::group(['middleware' => ['auth']], function () {

    // フォルダが既に作成されている場合はタスク一覧画面、作成されていない場合はホーム画面を表示する
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // フォルダを作成する
    Route::get('folders/create', [FoldersController::class, 'showCreateForm'])->name('folders.create');
    Route::post('folders/create', [FoldersController::class, 'create']);

    // ユーザーが登録したフォルダとタスクに関連する処理のみ実行する
    Route::group(['middleware' => ['can:view,folder']], function () {
        // タスク一覧を表示する
        Route::get('/folders/{folder}/tasks', [TasksController::class, 'index'])->name('tasks.index');
        // タスクを作成する
        Route::get('/folders/{folder}/tasks/create', [TasksController::class, 'showCreateForm'])->name('tasks.create');
        Route::post('/folders/{folder}/tasks/create', [TasksController::class, 'create']);
        // タスクを編集する
        Route::get('/folders/{folder}/tasks/{task}/edit', [TasksController::class, 'showEditForm'])->name('tasks.edit');
        Route::post('/folders/{folder}/tasks/{task}/edit', [TasksController::class, 'edit']);
        // タスクを削除する
        Route::post('/folders/{folder}/tasks/{task}/delete', [TasksController::class, 'delete'])->name('tasks.delete');
    });
});

// ユーザー登録、ログイン、ログアウト、パスワード再設定の処理を実行する
Auth::routes();
