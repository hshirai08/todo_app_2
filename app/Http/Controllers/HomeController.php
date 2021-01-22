<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Folder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();
        // ログインユーザーが1番目に登録したフォルダを取得する
        $folder = $user->folders()->first();

        // フォルダが登録されている場合はタスク一覧画面を表示する
        if (isset($folder)) {
            return redirect()->route('tasks.index', [
                'folder' => $folder,
            ]);
        }
        // フォルダが登録されてない場合はホーム画面を表示する
        else {
            return view('home');
        }
    }
}
