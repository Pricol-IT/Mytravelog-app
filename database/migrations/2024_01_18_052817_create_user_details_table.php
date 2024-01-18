<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id')->constrained()->cascadeOnDelete();
            $table->string('designation');
            $table->string('department');
            $table->string('grade');
            $table->string('company');
            $table->string('repostingto');
            $table->string('location')->nullable();
            $table->date('dob');
            $table->bigInteger('aadharno')->nullable();
            $table->string('passportno')->nullable();
            $table->bigInteger('mobilenumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
