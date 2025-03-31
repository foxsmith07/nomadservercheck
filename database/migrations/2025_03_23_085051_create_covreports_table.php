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
        Schema::create('covreports', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime');
            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trains');
            $table->string('worker');
            $table->string('request');
            $table->string('resolved');
            $table->string('ticket')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covreports');
    }
};
