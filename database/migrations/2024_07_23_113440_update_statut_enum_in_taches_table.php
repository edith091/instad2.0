<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatutEnumInTachesTable extends Migration
{
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            // Assurez-vous que les valeurs ici sont correctes
            $table->enum('statut', ['en attente', 'en cours', 'terminée', 'annulée', 'autre_valeur'])->change();
        });
    }

    public function down()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->enum('statut', ['en attente', 'en cours', 'terminée', 'annulée'])->change();
        });
    }
}
