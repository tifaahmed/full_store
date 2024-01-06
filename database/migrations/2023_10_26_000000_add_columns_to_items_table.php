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
                $table->time('start_time')->nullable();
			}

            if (!Schema::hasColumn('items', 'end_time')) {
                $table->time('end_time')->nullable();
			}
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            if (Schema::hasColumn('items', 'start_time')) {
                $table->dropColumn('start_time');
			}
            if (Schema::hasColumn('items', 'end_time')) {
                $table->dropColumn('end_time');
			}
        });    
    }
};
