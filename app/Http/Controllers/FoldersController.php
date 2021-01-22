<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Folder;
use App\Http\Requests\FolderRequest;

class FoldersController extends Controller
{
    /**
     * GET /folders/create
     * フォルダ作成画面を表示する
     */
    public function showCreateForm()
    {
        return view('folders/create');
    }

    /**
     * POST /folders/create
     * フォルダをデータベースに登録する
     */
    public function create(FolderRequest $request)
    {
        // フォルダのインスタンスを作成する
        $folder = new Folder();
        // 作成したフォルダにフォルダ名を設定する
        $folder->title = $request->title;
        // ログインユーザーと紐づけてデータベースに登録する
        $request->user()->folders()->save($folder);

        // 作成したフォルダのタスク一覧画面を表示する
        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }
}
