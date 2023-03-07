<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_driver_id')->unsigned();
            $table->decimal('fuel_litter');
            $table->string('fuel_type');
            $table->integer('rate');
            $table->decimal('total_amount');
            $table->date('date');
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
        Schema::drop('fuel_details');
    }
}
