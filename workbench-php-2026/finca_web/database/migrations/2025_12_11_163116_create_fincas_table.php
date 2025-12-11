<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('fincas')) {
            Schema::create('fincas', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->string('ubicacion');
                $table->double('hectareas_totales');
                $table->string('descripcion')->nullable();
                $table->foreignId('user_id')->constrained()->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('fincas');
    }
};
