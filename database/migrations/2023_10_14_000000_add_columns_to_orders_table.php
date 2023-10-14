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
            if (!Schema::hasColumn('orders', 'latitude')) {
                $table->longText('latitude')->nullable();
			}

            if (!Schema::hasColumn('orders', 'longitude')) {
                $table->longText('longitude')->nullable();
			}
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');     
        });    
    }
};
