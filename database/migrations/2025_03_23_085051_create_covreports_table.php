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
            $table->date('day');
            $table->time('time',precision:0);
            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trains');
            $table->string('worker');
            $table->string('request');
            $table->string('resolved');
            $table->string('ticket');
            $table->longText('note');
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
