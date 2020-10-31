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
            $table->id();
            $table->unsignedBigInteger('todolist_id')->nullable();
            $table->text('taskname');
            $table->text('description');
            $table->date('duedate');
            $table->integer('priority')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
            $table->foreign('todolist_id')->references('id')->on('todolists')->onDelete('cascade');;
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
