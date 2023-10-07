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
        Schema::table('settings', function (Blueprint $table) {
			if (!Schema::hasColumn('settings', 'pixel_header')) {
                $table->longText('pixel_header')->nullable();
			}
            if (!Schema::hasColumn('settings', 'pixel_footer')) {
                $table->longText('pixel_footer')->nullable();
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
