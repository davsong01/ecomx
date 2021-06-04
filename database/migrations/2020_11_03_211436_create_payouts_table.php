<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutsTable extends Migration
{

    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('amount_requested');
            $table->integer('amount_paid')->default(0);
            $table->date('paid_at')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payouts');
    }
}
