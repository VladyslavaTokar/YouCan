<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->index();
            $table->string('name');
            $table->boolean('completed_day_one')->default(false);
            $table->boolean('completed_day_two')->default(false);
            $table->boolean('completed_day_three')->default(false);
            $table->boolean('completed_day_four')->default(false);
            $table->boolean('completed_day_five')->default(false);
            $table->boolean('completed_day_six')->default(false);
            $table->boolean('completed_day_seven')->default(false);
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
        Schema::dropIfExists('routines');
    }
}
