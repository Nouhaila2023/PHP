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
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->double('hectareas');
            $table->date('fecha_siembra');
            $table->enum('estado',['en_cultivo','en_descanso','preparacion']);
            $table->string('notas')->nullable();
            $table->foreignId('finca_id')->index();
            $table->foreignId('tipo_cultivo_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parcelas');
    }
};
