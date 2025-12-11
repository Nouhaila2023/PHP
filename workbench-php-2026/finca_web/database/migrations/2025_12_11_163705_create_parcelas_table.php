<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('parcelas')) {
            Schema::create('parcelas', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->foreignId('finca_id')->constrained()->cascadeOnDelete();
                $table->foreignId('tipo_cultivo_id')->constrained('tipo_cultivos')->cascadeOnDelete();
                $table->double('hectareas');
                $table->date('fecha_siembra')->nullable();
                $table->enum('estado', ['en_cultivo', 'en_descanso', 'preparacion'])->default('en_cultivo');
                $table->text('notas')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('parcelas');
    }
};
