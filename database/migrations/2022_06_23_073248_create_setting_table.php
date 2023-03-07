<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Setting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_logo');
            $table->string('intro_screen_one_img');
            $table->string('intro_screen_one_title');
            $table->text('intro_screen_one_desc');
            $table->string('intro_screen_two_img');
            $table->string('intro_screen_two_title');
            $table->text('intro_screen_two_desc');
            $table->string('intro_screen_three_img');
            $table->string('intro_screen_three_title');
            $table->text('intro_screen_three_desc');
            $table->decimal('refer_comission_amt');
            $table->integer('pagination_limit');
            $table->string('helpline_number');
            $table->string('helpline_email');
            $table->decimal('km_rate');
            $table->decimal('per_km_panelty_rate');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Setting');
    }
}
