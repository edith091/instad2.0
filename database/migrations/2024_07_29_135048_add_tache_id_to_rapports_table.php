<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTacheIdToRapportsTable extends Migration
{
    public function up()
    {
        Schema::table('rapports', function (Blueprint $table) {
            $table->foreignId('tache_id')->constrained('taches')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('rapports', function (Blueprint $table) {
            $table->dropForeign(['tache_id']);
            $table->dropColumn('tache_id');
        });
    }
}
