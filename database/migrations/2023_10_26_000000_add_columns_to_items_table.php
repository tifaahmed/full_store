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
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'start_time')) {
                $table->time('start_time')->default('00:00:01');
			}

            if (!Schema::hasColumn('items', 'end_time')) {
                $table->time('end_time')->default('24:00:00');
			}
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');     
        });    
    }
};
