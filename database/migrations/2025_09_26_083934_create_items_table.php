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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->integer('quantity_stock');
            $table->string('position');
            $table->integer('quantity_ordered')->default(0);
            $table->timestamp('data_ordered')->nullable();
            $table->integer('quantity_shipped')->default(0);
            $table->timestamp('data_shipped')->nullable();
            // $table->boolean('ordered')->default(false);
            // $table->boolean('shipped')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
