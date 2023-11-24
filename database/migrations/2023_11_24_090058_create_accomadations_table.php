<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trip;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accomadations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Trip::class, 'trip_id')->constrained()->cascadeOnDelete();
            $table->string('tripid');
            $table->string('location');
            $table->dateTime('checkin');
            $table->dateTime('checkout');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomadations');
    }
};
