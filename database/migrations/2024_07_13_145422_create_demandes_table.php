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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('equipement_id')->constrained('equipements', 'id')->onDelete('cascade');
            $table->string('description');
            $table->string('date_demande');
            $table->enum('statut', ['en cours', 'traité', 'affecté', 'non traité', 'rejeté'])->default('en cours');
            $table->enum('priorite', ['gênant', 'bloquant']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
