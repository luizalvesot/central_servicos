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
        Schema::create('categoria_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_servico');
            $table->string('chave_servico');
            $table->integer('tempo_servico')->nullable();
            $table->integer('dificuldade_servico')->nullable();
            $table->decimal('valor_servico', 10, 2)->nullable();
            $table->text('obs_servico')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_servicos');
    }
};
