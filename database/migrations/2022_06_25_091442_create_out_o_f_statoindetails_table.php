<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutOFStatoindetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('out_o_f_statoindetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_driver_id')->unsigned();
            $table->date('from_date');
            $table->date('to_date');
            $table->dateTime('from_time');
            $table->dateTime('to_time');
            $table->string('location');
            $table->decimal('late');
            $table->decimal('longe');
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
        Schema::drop('out_o_f_statoindetails');
    }
}
