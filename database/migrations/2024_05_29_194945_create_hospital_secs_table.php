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
        Schema::create('hospital_secs', function (Blueprint $table) {
            $table->id();

            $table->string('doctor_name')->nullable();
            $table->string('description')->nullable();
            $table->string('Price')->nullable();
            $table->string('category')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_secs');
    }
};
