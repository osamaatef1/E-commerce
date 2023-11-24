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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->decimal('price')->nullable();
            $table->text('imagepath')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('cat_id')->constrained('categories');
     ///       $table->unsignedBigInteger('cat_id');
       //     $table->foreign('cat_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
