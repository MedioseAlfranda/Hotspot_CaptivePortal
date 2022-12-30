<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at');
            $table->string('provider_id')->nullable();
            $table->string('provider_name')->nullable();

            $table->string('photo_account')->nullable();

            $table->string('handphone')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();   
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();           
            $table->string('user_role')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_accounts');
    }
}
