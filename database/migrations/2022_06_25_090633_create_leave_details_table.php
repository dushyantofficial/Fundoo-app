<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_driver_id')->unsigned();
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->string('leave_type');
            $table->integer('status');
            $table->string('remark');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('assign_driver_id')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('leave_details');
    }
}
