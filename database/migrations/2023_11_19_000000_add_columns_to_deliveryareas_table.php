<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('deliveryareas', function (Blueprint $table) {
            if (!Schema::hasColumn('deliveryareas', 'delivery_time')) {
                $table->string('delivery_time');
                $table->text('coordinates');
			}
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deliveryareas', function (Blueprint $table) {
            $table->dropColumn('delivery_time');
            $table->dropColumn('coordinates');
        });    
    }
};
