<?php

use Illuminate\Database\Seeder;
// use UsersTableSeeder;

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

        // Usersテーブルのシーディングを実行
        $this->call(UsersTableSeeder::class);
    }
}
