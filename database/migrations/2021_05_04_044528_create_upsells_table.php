<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upsells', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->integer('plan_id');
            $table->string('name');
            $table->float('price');
            $table->string('f_images');
            $table->string('slug')->unique();
            $table->text('video_link')->nullable();
            $table->integer('status'); //Published = 1; Draft = 0;
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
        Schema::dropIfExists('upsells');
    }
}
