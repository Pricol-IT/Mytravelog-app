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
        Schema::table('connectivities', function (Blueprint $table) {
            $table->integer('international_roaming');
            $table->integer('mobile_number');
            $table->dropColumn('connection');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('connectivities', function (Blueprint $table) {
            //
        });
    }
};
