<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // Usersテーブル
        $this->call(UsersTableSeeder::class);
        // Foldersテーブル
        $this->call(FoldersTableSeeder::class);
        // Tasksテーブル
        $this->call(TasksTableSeeder::class);
    }
}
