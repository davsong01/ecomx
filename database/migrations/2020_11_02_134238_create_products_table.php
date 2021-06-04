<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->float('price');
            $table->string('f_image');
            $table->string('slug')->unique();
            $table->string('upsell_products')->nullable();
            $table->string('salespage_link')->nullable();
            $table->string('salespage_file')->nullable();
            $table->text('videos')->nullable();
            $table->string('image')->nullable();
            $table->text('creatives')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('status'); //Published = 1; Draft = 0;
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
