<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('driver_id')->unsigned();
            $table->string('pickup_drop_or_temp');
            $table->string('incity_or_out_city');
            $table->string('live_or_advance');
            $table->decimal('start_late');
            $table->decimal('start_long');
            $table->decimal('destination_late');
            $table->decimal('destination_long');
            $table->date('start_or_pickup_date');
            $table->time('start_or_pickup_time');
            $table->date('end_or_drop_date');
            $table->time('end_or_drop_time');
            $table->dateTime('assign_driver_date');
            $table->decimal('total_payment');
            $table->string('picture_befor_start');
            $table->string('picture_befor_end');
            $table->string('cancel_reason');
            $table->string('total_panelty');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
