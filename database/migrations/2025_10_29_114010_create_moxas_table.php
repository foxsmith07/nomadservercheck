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
        Schema::create('moxas', function (Blueprint $table) {
            $table->id();
            
            $table->string('sw1')->nullable();
            $table->string('p1_1')->nullable();
            $table->string('p2_1')->nullable();
            $table->string('p13_1')->nullable();
            $table->string('p14_1')->nullable();
            
            $table->string('sw2')->nullable();
            $table->string('p1_2')->nullable();
            $table->string('p2_2')->nullable();
            $table->string('p13_2')->nullable();
            $table->string('p14_2')->nullable();
            
            $table->string('sw3')->nullable();
            $table->string('p1_3')->nullable();
            $table->string('p2_3')->nullable();
            $table->string('p13_3')->nullable();
            $table->string('p14_3')->nullable();

            $table->string('sw4')->nullable();
            $table->string('p1_4')->nullable();
            $table->string('p2_4')->nullable();
            $table->string('p13_4')->nullable();
            $table->string('p14_4')->nullable();

            $table->string('sw5')->nullable();
            $table->string('p1_5')->nullable();
            $table->string('p2_5')->nullable();
            $table->string('p13_5')->nullable();
            $table->string('p14_5')->nullable();

            $table->string('sw6')->nullable();
            $table->string('p1_6')->nullable();
            $table->string('p2_6')->nullable();
            $table->string('p13_6')->nullable();
            $table->string('p14_6')->nullable();
            $table->string('p15_6')->nullable();

            $table->string('sw7')->nullable();
            $table->string('p1_7')->nullable();
            $table->string('p2_7')->nullable();
            $table->string('p13_7')->nullable();
            $table->string('p14_7')->nullable();

            $table->string('sw8')->nullable();
            $table->string('p1_8')->nullable();
            $table->string('p2_8')->nullable();
            $table->string('p13_8')->nullable();
            $table->string('p14_8')->nullable();

            $table->string('sw9')->nullable();
            $table->string('p1_9')->nullable();
            $table->string('p2_9')->nullable();
            $table->string('p13_9')->nullable();
            $table->string('p14_9')->nullable();

            $table->string('sw10')->nullable();
            $table->string('p1_10')->nullable();
            $table->string('p2_10')->nullable();
            $table->string('p13_10')->nullable();
            $table->string('p14_10')->nullable();

            $table->string('sw11')->nullable();
            $table->string('p1_11')->nullable();
            $table->string('p2_11')->nullable();
            $table->string('p9_11')->nullable();
            $table->string('p10_11')->nullable();
            $table->string('p11_11')->nullable();
            $table->string('p12_11')->nullable();
            $table->string('p13_11')->nullable();
            $table->string('p14_11')->nullable();

            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trains');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moxas');
    }
};
