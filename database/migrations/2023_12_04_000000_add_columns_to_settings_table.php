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
            if (!Schema::hasColumn('settings', 'home_background_color')) {
                $table->string('home_background_color')->nullable();
			}
            if (!Schema::hasColumn('settings', 'footer_background')) {
                $table->string('footer_background')->nullable();
			}
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            if (Schema::hasColumn('settings', 'home_background_color')) {
                $table->dropColumn('home_background_color');
			}
            if (Schema::hasColumn('settings', 'footer_background')) {
                $table->dropColumn('footer_background');
			}    
        });    
    }
};
