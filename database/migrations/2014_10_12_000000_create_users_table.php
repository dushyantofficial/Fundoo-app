<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('country_code');
            $table->string('mobile_no')->unique();
            $table->integer('auth_otp')->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->string('gender');
            $table->string('role');
            $table->string('status');
            $table->integer('state');
            $table->integer('city');
            $table->string('pincode');
            $table->decimal('lati');
            $table->string('date_of_birth');
            $table->decimal('longi');
            $table->integer('is_online');
            $table->integer('reffer_by');
            $table->integer('is_assigned');
            $table->string('profile_image');
            $table->string('reffral_code');
            $table->integer('verify_user');
            $table->integer('is_doc_verified');
            $table->string('is_doc_verified');
            $table->string('device_token');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
