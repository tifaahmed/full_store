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
        Schema::table('orders', function (Blueprint $table) {
			if (!Schema::hasColumn('orders', 'block')) {
                $table->longText('block')->nullable()->after('address');
			}
            if (!Schema::hasColumn('orders', 'street')) {
                $table->longText('street')->nullable()->after('address');
			}

            if (!Schema::hasColumn('orders', 'house_num')) {
                $table->longText('house_num')->nullable()->after('address');
			}
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('pixel_header');
            $table->dropColumn('pixel_footer');     
        });    
    }
};
