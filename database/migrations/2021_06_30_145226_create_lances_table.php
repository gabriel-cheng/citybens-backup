<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lances', function (Blueprint $table) {
            $table->id();
            $table->integer('cota')->nullable();
            $table->float('credito', 10, 2)->nullable();
            $table->float('porcentagem_lance')->nullable();
            $table->float('valor_lance_total')->nullable();
            $table->float('porcentagem_lance_embutido')->nullable();
            $table->float('valor_lance_embutido')->nullable();
            $table->float('porcentagem_lance_proprio')->nullable();
            $table->float('valor_lance_proprio')->nullable();
            $table->foreignId('administradora')
                ->constrained('administradoras');
            $table->foreignId('created_by')
                ->constrained('users');
            $table->string('cliente')->nullable();
            $table->boolean('quitacao_grupo')->nullable();
            $table->float('carta_avaliacao')->nullable();
            $table->enum('status', ['Lance Criado', 'Lance Confirmado', 'cancelado', 'Lance Premiado', 'Lance Pago', 'finalizado'])->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('lances');
    }
}
