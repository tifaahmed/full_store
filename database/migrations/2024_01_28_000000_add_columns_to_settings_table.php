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
			if (!Schema::hasColumn('settings', 'is_active_modal_gps')) {
                $table->boolean('is_active_modal_gps')->default(1);
			}
            if (!Schema::hasColumn('settings', 'web_footer_color')) {
                $table->string('web_footer_color')->nullable();
			}
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('is_active_modal_gps');
            $table->dropColumn('web_footer_color');
        });    
    }
};
