<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCarDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_car_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name');
            $table->string('model_name');
            $table->string('year');
            $table->string('manual_or_automatic');
            $table->string('number_plate');
            $table->string('car_photos');
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->foreign('company_id')->references('id')->on('carcompanies')->onDelete('cascade');
//            $table->foreign('model_id')->references('id')->on('carmodels')->onDelete('cascade');
//            $table->foreign('year_id')->references('id')->on('caryears')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_car_details');
    }
}
