<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('seance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_salle')->after('id')->nullable();
            $table->foreign('id_salle')->references('id')->on('salles')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('seance', function (Blueprint $table) {
            $table->dropForeign(['id_salle']);
            $table->dropColumn('id_salle');
        });
    }
};
