<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

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

// タスク一覧を表示する
Route::get('/', [TasksController::class, 'index'])->name('tasks.index');

// ユーザー登録、ログイン、ログアウト、パスワード再設定の処理を実行する
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
