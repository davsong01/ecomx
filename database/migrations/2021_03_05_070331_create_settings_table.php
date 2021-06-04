<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('referral_percent')->default(10);
            $table->string('official_mail')->default("davedeloper@gmail.com");
            $table->string('suggestion_mail')->default("davedeloper@gmail.com");
            $table->string('logo')->default('images/site/loader.jpg');
            $table->string('preloader')->default('images/site/favicon.ico');
            $table->string('favicon')->default('images/site/loader.jpg');
            $table->float('referral_threshold')->default('0');
            $table->text('salespage_howto')->nullable();
            $table->text('facebook_howto')->nullable();
            $table->text('upsell_howto')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
