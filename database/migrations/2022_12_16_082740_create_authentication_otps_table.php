<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthenticationOtpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authentication_otps', function (Blueprint $table) {      
            $table->id('auth_otp_id');
            $table->UnsignedBigInteger('user_id');
            $table->string('OTP');
            $table->string('amount')->nullable();
            $table->string('package')->nullable();
            $table->string('type_otp');
            $table->string('status')->default(0);
            $table->timestamps();
            $table->date('last_update_date');
            $table->string('last_by');

            
            $table->foreign('user_id')->references('user_id')->on('user_accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authentication_otps');
    }
}
