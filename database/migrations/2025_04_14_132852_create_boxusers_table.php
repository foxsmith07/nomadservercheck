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
        Schema::create('boxusers', function (Blueprint $table) {
            $table->id();
            $table->integer('usernum');
            $table->integer('train');
            // $table->unsignedBigInteger('train_id');
            // $table->foreign('train_id')->references('id')->on('trains');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxusers');
    }
};
