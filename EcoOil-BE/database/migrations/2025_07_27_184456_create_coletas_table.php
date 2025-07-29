<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('coletas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estabelecimento_id')->constrained('estabelecimentos')->onDelete('cascade');
            $table->foreignId('transportador_id')->nullable()->constrained('transportadors')->onDelete('set null');
            $table->decimal('quantidade_oleo', 8, 2); 
            $table->string('endereco');
            $table->string('telefone');
            $table->enum('qualidade_oleo', ['excelente', 'boa', 'regular', 'ruim']);
            $table->enum('dia_semana', ['segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado', 'domingo']);
            $table->enum('status', ['disponivel', 'aceita', 'coletada', 'recusada'])->default('disponivel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coletas');
    }
};
