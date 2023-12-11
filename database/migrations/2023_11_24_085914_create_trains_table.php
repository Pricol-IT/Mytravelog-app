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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Trip::class, 'trip_id')->constrained()->cascadeOnDelete();
            $table->string('tripid');
            $table->string('origin');
            $table->string('destination');
            $table->string('trip_class');
            $table->dateTime('preferred_date');
            $table->string('status')->default('pending');
            $table->string('ticket')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
