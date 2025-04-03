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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('train_id');
            // $table->foreign('train_id')->references('id')->on('trains');
            $table->string('train');
            $table->string('event');
            $table->string('impact');
            $table->string('start_expected');
            $table->string('start_actual');
            $table->string('end_expected');
            $table->string('end_actual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
