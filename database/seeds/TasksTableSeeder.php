<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tasksテーブルにデータを追加する
        DB::table('tasks')->insert([
            [
                'folder_id' => 1,
                'title' => '書類提出',
                'status' => 1,
                'due_date' => Carbon::now()->addDay(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'folder_id' => 1,
                'title' => 'タスク追加機能実装',
                'status' => 2,
                'due_date' => Carbon::now()->addDay(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'folder_id' => 1,
                'title' => 'タスク編集機能実装',
                'status' => 3,
                'due_date' => Carbon::now()->yesterday(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'folder_id' => 2,
                'title' => '料金支払',
                'status' => 1,
                'due_date' => Carbon::now()->addDay(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
