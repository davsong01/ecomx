<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmbassadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ambassadors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('ambassadors');
    }
}
