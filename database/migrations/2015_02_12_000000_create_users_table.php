<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('plan_id')->nullable();
            $table->datetime('plan_expiry')->nullable();
            $table->datetime('plan_start')->nullable();
            $table->float('validity')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('level')->default(1); //Admin:2; Usermanager: 3; Product Manager: 4
            $table->float('referral_bonus')->default(0.0);
            $table->string('my_upline')->nullable();
            
            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('salespage_limit')->default(1);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
