<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiquesTable extends Migration
{
    public function up()
    {
        Schema::create('caracteristiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idTypeEquipement')->constrained('type_equipements', 'idTypeEquipement')->onDelete('cascade');
            $table->foreignId('equipement_id')->constrained('equipements', 'id')->onDelete('cascade');
            $table->string('marque')->nullable();
            $table->string('modele')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('os')->nullable();
            $table->string('ecran')->nullable();
            $table->string('gpu')->nullable();
            $table->string('printer_type')->nullable();
            $table->string('print_speed')->nullable();
            $table->string('scanner_type')->nullable();
            $table->string('resolution')->nullable();
            $table->string('other_type')->nullable();
            $table->string('details')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caracteristiques');
    }
}