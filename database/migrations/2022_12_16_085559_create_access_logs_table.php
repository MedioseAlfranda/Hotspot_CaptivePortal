<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_logs', function (Blueprint $table) {       
            $table->id('access_log_id');
            $table->unsignedBigInteger('user_id');
            $table->string('mac_address');
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
        Schema::dropIfExists('access_logs');
    }
}
