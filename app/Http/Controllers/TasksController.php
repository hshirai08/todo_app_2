<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * GET /folders/{folder}/tasks
     * タスク一覧を表示
     */
    public function index()
    {
        return view('tasks.index');
    }
}
