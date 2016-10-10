<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gentleman_image');
            $table->string('ladies_image');
            $table->string('acc_image');
            $table->string('outlet_image');
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
        Schema::drop('front_images');
    }
}
