<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_retings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rated_to')->unsigned();
            $table->integer('rated_by')->unsigned();
            $table->integer('star');
            $table->string('coment')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rated_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rated_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_retings');
    }
}
