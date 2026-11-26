<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('accreditations', function (Blueprint $table) {
            $table->id();
            $table->string('badge_number', 10)->default('01');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('theme')->default('forest'); // forest | gold | emerald | pine | amber
            $table->string('icon')->default('award'); // award | book | chart | check | bulb
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accreditations');
    }
};