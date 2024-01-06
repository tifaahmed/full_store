<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            if (!Schema::hasColumn('branches', 'latitude')) {
                $table->string('latitude')->nullable();
			}
            if (!Schema::hasColumn('branches', 'longitude')) {
                $table->string('longitude')->nullable();
			}
            if (!Schema::hasColumn('branches', 'address')) {
                $table->text('address')->nullable();
			}
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            if (Schema::hasColumn('branches', 'latitude')) {
                $table->dropColumn('latitude');
			}
            if (Schema::hasColumn('branches', 'longitude')) {
                $table->dropColumn('longitude');
			}
            if (Schema::hasColumn('branches', 'address')) {
                $table->dropColumn('address');
			}
        });  
    }
};
