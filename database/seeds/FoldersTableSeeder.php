<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 作成するフォルダ名を配列に格納する
        $titles = ['仕事', 'プライベート', '旅行'];

        // Foldersテーブルにデータを追加する
        foreach ($titles as $title) {
            DB::table('folders')->insert([
                'user_id' => 1,
                'title' => $title,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
