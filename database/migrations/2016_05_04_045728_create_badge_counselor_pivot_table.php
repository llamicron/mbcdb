<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgeCounselorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_counselor', function (Blueprint $table) {
            $table->integer('badge_id')->unsigned()->index();
            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('cascade');
            $table->integer('counselor_id')->unsigned()->index();
            $table->foreign('counselor_id')->references('id')->on('counselors')->onDelete('cascade');
            $table->primary(['badge_id', 'counselor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('badge_counselor');
    }
}
