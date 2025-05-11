<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('cuidados', function (Blueprint $table) {
        $table->id();
        $table->foreignId('animal_id')
              ->constrained('animais')  
              ->onDelete('cascade');     
        $table->string('nome_cuidado');
        $table->text('descricao')->nullable();
        $table->string('frequencia')->nullable();
        $table->timestamps();
    });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('cuidados');
    }
};
