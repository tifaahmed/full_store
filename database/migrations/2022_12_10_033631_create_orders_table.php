<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vendor_id');
            $table->integer('user_id')->nullable();
            $table->text('session_id')->nullable();
            $table->string('order_number');

            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_mobile');

            $table->string('billing_address');
            $table->string('billing_landmark');
            $table->string('billing_postal_code');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_country');

            $table->string('shipping_address');
            $table->string('shipping_landmark');
            $table->string('shipping_postal_code');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_country');
            
            $table->double('sub_total')->default(0.0);
            $table->string('offer_code')->nullable();
            $table->double('offer_amount')->nullable()->default(0.0);
            $table->double('tax_amount')->default(0.0);
            $table->string('shipping_area');
            $table->double('delivery_charge')->default(0.0);
            $table->double('grand_total')->default(0.0);

            $table->string('transaction_id')->nullable();
            $table->boolean('transaction_type')->default(1);
            $table->integer('status')->comment('1 = order placed , 2 = order confirmed/accepted , 3 = order cancelled/rejected - by admin , 4 = order cancelled/rejected - by user/customer , 5 = order delivered , ');

            $table->longText('notes')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
