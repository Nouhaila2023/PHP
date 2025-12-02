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
        Schema::create('fincas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ubicacion');
            $table->decimal('hectareas_totales', 8, 2);
            $table->text('descripcion')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fincas');
    }

    //Relación: una finca pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relación: una finca puede tener muchas parcelas
    public function parcelas()
    {
        return $this->hasMany(Parcela::class);
    }
    
};
