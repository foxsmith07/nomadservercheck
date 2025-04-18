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
        Schema::create('obns', function (Blueprint $table) {
            $table->id();
            $table->string('train');
            $table->string('type');
            $table->string('coach');
            $table->string('num');
            $table->string('ip');
            $table->string('fw');
            $table->string('conf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obns');
    }
};
