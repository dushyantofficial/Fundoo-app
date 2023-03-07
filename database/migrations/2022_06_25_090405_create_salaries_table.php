<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_driver_id')->unsigned();
            $table->decimal('amount');
            $table->dateTime('date');
            $table->string('type');
            $table->integer('paid_unpaid');
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
        Schema::drop('salaries');
    }
}
