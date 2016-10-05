<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('counselor_id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->nullableTimestamps();
        });
    }

    // This is a small change

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('saves');
    }
}
