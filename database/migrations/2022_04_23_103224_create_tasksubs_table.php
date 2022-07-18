<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasksubs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('task_id');
            $table->string('title');
            $table->text('description');
            $table->boolean('completed')->default(false);
            $table->integer('priority')->default(4);
            $table->date('date');
            $table->timestamps();
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasksubs');
    }
}
