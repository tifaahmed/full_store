<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            
            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('title')->nullable();
            $table->integer('type')->nullable();

            $table->text('address')->nullable();
            $table->string('house_num')->nullable();
            $table->string('street')->nullable();
            $table->string('block')->nullable();
            $table->string('pincode')->nullable();
            $table->string('building')->nullable();
            $table->string('landmark')->nullable();
            $table->string('delivery_area')->nullable();

            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();

            $table->boolean('is_active')->nullable();
            
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
        Schema::dropIfExists('user_addresses');
    }
};
