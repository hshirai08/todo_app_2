<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            // tasksテーブルを作成する
            $table->id();
            $table->bigInteger('folder_id')->unsigned();
            $table->string('title', 100);
            $table->integer('status');
            $table->date('due_date');
            $table->timestamps();

            // foldersテーブルの id を指定して、folder_id を外部キーに設定する
            $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
