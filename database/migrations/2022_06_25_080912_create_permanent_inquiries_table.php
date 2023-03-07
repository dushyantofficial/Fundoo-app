<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermanentInquiriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permanent_inquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('salary_start');
            $table->decimal('salary_end');
            $table->string('weekly_off');
            $table->string('accomodetion');
            $table->string('need_local_person');
            $table->dateTime('work_time_from');
            $table->dateTime('work_time_to');
            $table->integer('status');
            $table->string('type');
            $table->integer('no_of_drivers');
            $table->date('from_date');
            $table->date('to_date');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permanent_inquiries');
    }
}
