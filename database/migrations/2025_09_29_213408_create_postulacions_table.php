<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postulaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('postulante_id')->constrained()->onDelete('cascade');
            $table->date('fecha_postulacion');
            $table->enum('estado', ['nuevo', 'en_evaluacion', 'aceptado', 'rechazado', 'repostulacion']);
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postulacions');
    }
};
