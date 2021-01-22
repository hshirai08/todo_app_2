<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    /**
     * 選択されたフォルダに紐づくタスクを全て取得する
     * 
     * @return task
     */
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
