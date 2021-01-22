<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Folder;
use App\Task;
use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskEditRequest;

class TasksController extends Controller
{
    /**
     * GET /folders/{folder}/tasks
     * タスク一覧画面を表示
     */
    public function index(Folder $folder)
    {
        // ログインユーザーを取得する
        $user = Auth::user();
        // ログインユーザーが登録したフォルダを全て取得する
        $folders = $user->folders()->get();

        // 選択されたフォルダのタスクを全て取得する
        $tasks = $folder->tasks()->get();

        // 選択されたフォルダのタスク一覧画面を表示する
        return view('tasks.index', [
            'folders' => $folders,
            'tasks' => $tasks,
            'current_folder_id' => $folder->id,
        ]);
    }

    /**
     * GET /folders/{folder}/tasks/create
     * タスク作成画面を表示する
     */
    public function showCreateForm(Folder $folder)
    {
        return view('tasks.create', [
            'folder' => $folder,
        ]);
    }

    /**
     * POST /folders/{folder}/tasks/create
     * タスクをデータベースに登録する
     */
    public function create(TaskCreateRequest $request, Folder $folder)
    {
        // タスクのインスタンスを作成する
        $task = new Task();
        // 作成したタスクにタイトル、期限日を設定する
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        $task->status = 1;
        // フォルダに紐づけてデータベースに登録する
        $folder->tasks()->save($task);

        // タスク一覧画面を表示する
        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }

    /**
     * GET /folders/{folder}/tasks/{task}/edit
     * タスク編集画面を表示する
     */
    public function showEditForm(Folder $folder, Task $task)
    {
        return view('tasks.edit', [
            'folder' => $folder,
            'task' => $task,
        ]);
    }

    /**
     * POST /folders/{folder}/tasks/{task}/edit
     * データベースに登録したタスクの情報を更新する
     */
    public function edit(TaskEditRequest $request, Folder $folder, Task $task)
    {
        // 登録したタスクのタイトル、状態、期限日を設定し直す
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        // データベースのタスクの情報を更新する
        $task->save();

        // タスク一覧画面を表示する
        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }

    /**
     * POST /folders/{folder}/tasks/{task}/delete
     * タスクを削除する
     */
    public function delete(Folder $folder, Task $task)
    {
        // データベースから選択されたタスクを削除する
        $task->delete();

        // タスク一覧画面を表示する
        return redirect()->route('tasks.index', [
            'folder' => $folder,
        ]);
    }
}
