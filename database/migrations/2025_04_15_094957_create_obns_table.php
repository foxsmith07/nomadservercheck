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
            
            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trains');
            
            $table->string('users')->nullable();

            $table->enum('type',['SW','AP']);
            $table->integer('coach');
            $table->integer('device');
            $table->string('ip');
            $table->string('firmware');
            $table->string('config');
            $table->string('lastcheck');
            
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
