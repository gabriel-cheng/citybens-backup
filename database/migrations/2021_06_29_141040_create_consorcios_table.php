<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsorciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consorcios', function (Blueprint $table) {
            $table->id();
            $table->string('consorcio', 255)->nullable();
            $table->float('credito', 10, 2)->nullable();
            $table->float('taxa_administracao')->nullable();
            $table->float('fundo_reserva')->nullable();
            $table->float('valor_parcela')->nullable();
            $table->integer('quantidade_parcelas')->nullable();
            $table->foreignId('administradora')
                ->constrained('administradoras');
            $table->boolean('active')->default(true);
            $table->foreignId('created_by')
                ->constrained('users');
            $table->foreignId('deleted_by')
                ->constrained('users');
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
        Schema::dropIfExists('consorcios');
    }
}
