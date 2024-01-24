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
        Schema::create('domestic_policies', function (Blueprint $table) {
            $table->id();
            $table->string('components');
            $table->string('junior_tier1');
            $table->string('junior_tier2');
            $table->string('junior_tier3');
            $table->string('middle_tier1');
            $table->string('middle_tier2');
            $table->string('middle_tier3');
            $table->string('senior_tier1');
            $table->string('senior_tier2');
            $table->string('senior_tier3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domestic_policies');
    }
};
