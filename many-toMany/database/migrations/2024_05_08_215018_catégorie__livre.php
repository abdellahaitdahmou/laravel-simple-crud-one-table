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
        Schema::create('catégorie_livre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('catégorie_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('catégorie_id')->references('id')->on('catégories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catégorie_livre');
    }
};
