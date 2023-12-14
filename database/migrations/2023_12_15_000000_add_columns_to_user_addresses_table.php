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
        Schema::table('user_addresses', function (Blueprint $table) {
            if (!Schema::hasColumn('user_addresses', 'user_ip')) {
                $table->string('user_ip');            
			}
            if (!Schema::hasColumn('user_addresses', 'delivery_area_id')) {
                $table->string('delivery_area_id');            
			}
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_addresses', function (Blueprint $table) {
            if (Schema::hasColumn('user_addresses', 'user_ip')) {
                $table->dropColumn('user_ip');
			}
            if (Schema::hasColumn('user_addresses', 'delivery_area_id')) {
                $table->dropColumn('delivery_area_id');			
            }

      });   
    }
};
