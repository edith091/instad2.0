<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTechnicienIdToDemandesTable extends Migration
{
    public function up()
    {
        Schema::table('demandes', function (Blueprint $table) {
            // Ajouter la colonne technicien_id
            $table->foreignId('technicien_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
            // Supprimer la colonne technicien_id si nécessaire
            $table->dropForeign(['technicien_id']);
            $table->dropColumn('technicien_id');
        });
    }
}















