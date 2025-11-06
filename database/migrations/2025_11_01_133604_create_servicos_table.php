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
    Schema::create('servicos', function (Blueprint $table) {
        $table->id();

        // --- ADICIONE ESTAS 5 LINHAS ---
        $table->string('tipo'); // ex: "Banho", "Tosa", "Consulta"
        $table->text('descricao')->nullable(); // nullable() = pode ficar em branco
        $table->date('data');
        $table->decimal('valor', 8, 2); // 8 dígitos no total, 2 depois da vírgula (ex: 120.50)

        // Esta é a chave estrangeira (relacionamento):
        $table->foreignId('animal_id')->constrained('animais');
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
        Schema::dropIfExists('servicos');
    }
};
