<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();

            $table->string('tipo');
            $table->text('descricao')->nullable();
            $table->date('data');
            $table->decimal('valor', 8, 2);

            // chave estrangeira com CASCADE
            $table->foreignId('animal_id')
                ->constrained('animais')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
