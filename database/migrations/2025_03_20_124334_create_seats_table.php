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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->unsignedBigInteger('id_Film');
            $table->unsignedBigInteger('id_session');
            $table->unsignedBigInteger('id_salle');
            
            $table->foreign('id_Film')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('id_session')->references('id')->on('sessions')->onDelete('cascade');
            $table->foreign('id_salle')->references('id')->on('salles')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
