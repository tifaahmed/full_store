<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vendor_id');
            $table->integer('user_id')->nullable();
            $table->text('session_id')->nullable();
            $table->integer('order_id');

            $table->integer('product_id');
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_image');

            $table->string('attribute')->nullable();
            $table->integer('variation_id')->nullable();
            $table->string('variation_name')->nullable();

            $table->double('product_price');
            $table->double('product_tax');
            
            $table->integer('qty')->default(1);
            
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
        Schema::dropIfExists('order_details');
    }
}
