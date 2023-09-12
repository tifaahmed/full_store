<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->string('offer_name');
            $table->string('offer_code');
            $table->integer('offer_type')->comment('1=fixed,2=percentage');
            $table->string('offer_amount');
            $table->integer('min_amount');
            $table->integer('usage_type')->comment('1=one time,2=multiple times');
            $table->integer('usage_limit');
            $table->date('start_date');
            $table->date('exp_date');
            $table->longText('description');
            $table->longText('is_available')->comment('1=yes,2=no');
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
        Schema::dropIfExists('promocodes');
    }
}
