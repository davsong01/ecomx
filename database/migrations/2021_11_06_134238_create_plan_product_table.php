<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanProductTable extends Migration
{
    public function up()
    {
        Schema::create('plan_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('plan_id');
            $table->integer('product_id');
           
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plan_product');
    }
}
