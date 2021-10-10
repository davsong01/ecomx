<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('features');
            $table->string('threempercentoff')->nullable();
            $table->string('sixmpercentoff')->nullable();
            $table->string('twelvempercentoff')->nullable();
            $table->float('mprice')->default(0);
            $table->float('threemprice')->default(0);
            $table->float('sixmprice')->default(0);
            $table->float('twelvemprice')->default(0);
            // $table->integer('validity');//number of days
            $table->integer('viewProducts')->default(1);//1: Yes; 0:No 
            $table->integer('viewUpsells');//1: Yes; 0:No 
            $table->integer('viewCreatives');//1: Yes; 0:No 
            $table->integer('viewBestSelling');//1: Yes; 0:No 

            $table->integer('status')->default(0);//0: Draft; 1:publishd

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
