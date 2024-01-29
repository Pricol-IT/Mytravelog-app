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
        Schema::create('international_policies', function (Blueprint $table) {
            $table->id();
            $table->string('components');
            $table->string('level');
            $table->string('us');
            $table->string('uk');
            $table->string('europe');
            $table->string('asean');
            $table->string('brazil');
            $table->string('mexico');
            $table->string('india');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('international_policies');
    }
};
