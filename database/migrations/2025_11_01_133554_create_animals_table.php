<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('animais', function (Blueprint $table) {
        $table->id();

        // --- ADICIONE ESTAS 4 LINHAS ---
        $table->string('nome');
        $table->string('especie');
        $table->string('raca');
        
        // Esta é a chave estrangeira (relacionamento):
        $table->foreignId('cliente_id')->constrained('clientes');
        // ---------------------------------

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
};
