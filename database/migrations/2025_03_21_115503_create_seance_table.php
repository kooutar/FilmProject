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
        Schema::create('seance', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['VIP', 'Normale']);
            $table->time('startTime'); // Garder uniquement cette ligne
            $table->string('language');
            $table->unsignedBigInteger('id_film');
            $table->foreign('id_film')->references('id')->on('films');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seance');
    }
};
