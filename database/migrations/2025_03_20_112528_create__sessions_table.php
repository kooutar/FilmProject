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

        if (!Schema::hasTable('sessions')){
            Schema::createIfNotExists('sessions', function (Blueprint $table) {
                $table->id();
                $table->enum('type',['VIP','Normale']);
                $table->time('startTime');
                $table->string('startTime');
                $table->timestamps();
            });
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
