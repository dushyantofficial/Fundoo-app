<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reportings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_driver_id')->unsigned();
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('assign_driver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('daily_reportings');
    }
}
