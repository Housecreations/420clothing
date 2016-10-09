<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleDetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            
            $table->string('color');
            $table->string('size');
            $table->integer('stock');
            
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
        Schema::drop('articleDetails');
    }
}
