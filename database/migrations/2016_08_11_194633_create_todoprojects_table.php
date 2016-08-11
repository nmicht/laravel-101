<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_project', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag');
            $table->integer('todo_id')->unsigned()->index();
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('todo_project');
    }
}
