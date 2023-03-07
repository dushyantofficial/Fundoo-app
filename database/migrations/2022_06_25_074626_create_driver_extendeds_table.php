<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverExtendedsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_extendeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('aditional_contact_no')->unique();
            $table->decimal('expriance')->nullable();
            $table->string('post_ads_appartment')->nullable();
            $table->string('post_ads_block_flat')->nullable();
            $table->string('post_ads_proof')->nullable();
            $table->integer('post_ads_pincode')->nullable();
            $table->integer('post_ads_city')->nullable();;
            $table->integer('post_ads_state')->nullable();
            $table->string('post_ads_type')->nullable();
            $table->string('resi_ads_apartment')->nullable();
            $table->string('resi_ads_block_flate')->nullable();
            $table->integer('resi_ads_pincode')->nullable();
            $table->integer('resi_ads_city')->nullable();
            $table->integer('resi_ads_state')->nullable();
            $table->string('resi_ads_proof')->nullable();
            $table->string('license')->nullable();
            $table->integer('license_status')->nullable();
            $table->string('driving_licence_reject_reason')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->integer('aadhar_card_status')->nullable();
            $table->string('aadhar_card_reject_reason')->nullable();
            $table->string('pancard')->nullable();
            $table->integer('pancard_status')->nullable();
            $table->string('pancard_reject_reason')->nullable();
            $table->string('light_bill')->nullable();
            $table->integer('light_bill_status')->nullable();
            $table->string('light_bill_reject_reason')->nullable();
            $table->text('language_known')->nullable();
            $table->decimal('monthly_salary')->nullable();
            $table->string('work_type')->nullable();
            $table->string('work_station')->nullable();
            $table->integer('is_kyc_verify')->nullable();
            $table->string('work_time')->nullable();
            $table->string('multi_work_type')->nullable();
            $table->string('driver_type')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('select_vehicle_type')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_holder_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('post_ads_late')->nullable();
            $table->decimal('post_ads_long')->nullable();
            $table->decimal('resi_ads_late')->nullable();
            $table->decimal('resi_ads_long')->nullable();
            $table->string('current_location')->nullable();
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
        Schema::drop('driver_extendeds');
    }
}
