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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('inicio')->nullable();
            $table->dateTime('termino')->nullable();
            $table->integer('tempo_total')->nullable();
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('restrict');
            $table->string('descricao')->nullable();
            $table->foreignId('categoria_servico_id')->constrained('categoria_servicos')->onDelete('restrict');
            $table->decimal('valor', 10, 2)->nullable();
            $table->string('status_pagamento')->default('aberto');
            $table->foreignId('forma_pagamento_id')->nullable()->constrained('forma_pagamentos')->onDelete('restrict');
            $table->string('status_servico')->default('a fazer');
            $table->text('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
