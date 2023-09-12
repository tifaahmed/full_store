<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->integer('service_id')->nullable()->default(null);
            $table->integer('category_id')->nullable()->default(null);
            $table->string('image');
            $table->boolean('type')->nullable()->comment('1=category,2=service,3=')->default(null);
            $table->integer('section')->nullable()->comment('1=banner1,2=banner2,3=banner3')->default(1);
            $table->boolean('is_available')->comment('1=yes,2=no')->default('1');
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
        Schema::dropIfExists('banners');
    }
}
