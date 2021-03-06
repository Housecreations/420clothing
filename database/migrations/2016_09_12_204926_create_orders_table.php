<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function(Blueprint $table){
             $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('customid')->unique()->nullable();
            $table->integer('shopping_cart_id')->unsigned();
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts')->onDelete('cascade'); 
            $table->string('shipment_agency');
            $table->string('shipment_agency_id');
            $table->string('recipient_name');
            $table->string('recipient_id');
            $table->string('recipient_email');
            $table->string('payment_id');
            $table->string('payment_type');
            $table->date('payment_date');
            /*$table->enum('edited',['yes','no'])->default('no');*/
            $table->string('status')->default('En proceso');
            $table->string('guide_number')->nullable();
            $table->decimal('total', 10, 2);
             $table->enum('received',['yes','no'])->default('no');
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
         Schema::drop('orders');
    }
}
