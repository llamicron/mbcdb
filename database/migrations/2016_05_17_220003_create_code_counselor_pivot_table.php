<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodeCounselorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('code_counselor', function (Blueprint $table) {
            $table->integer('code_id')->unsigned()->index();
            $table->foreign('code_id')->references('id')->on('codes')->onDelete('cascade');
            $table->integer('counselor_id')->unsigned()->index();
            $table->foreign('counselor_id')->references('id')->on('counselors')->onDelete('cascade');
            $table->primary(['code_id', 'counselor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('code_counselor');
    }
}
