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
        Schema::create('roadmaps', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('trains');

            $table->string('serial')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('location')->nullable();
            $table->enum('fluke', ['done', 'todo']);
            $table->longText('note')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmaps');
    }
};
