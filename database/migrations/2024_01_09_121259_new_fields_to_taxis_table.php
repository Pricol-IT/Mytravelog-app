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
        Schema::table('taxis', function (Blueprint $table) {
            $table->string('airport_to_hotel')->nullable();
            $table->string('hotel_to_company')->nullable();
            $table->integer('no_of_days')->nullable();
            $table->string('class')->nullable();
            $table->dateTime('pick_date')->nullable();
            $table->dateTime('drop_date')->nullable();
            $table->dropColumn('origin');
            $table->dropColumn('destination');
            $table->dropColumn('trip_taxi');
            $table->dropColumn('preferred_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taxis', function (Blueprint $table) {
            //
        });
    }
};
