<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsorciosParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consorcios_parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consorcio_simulator_id')
                ->constrained('consorcios_simulator')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('parcelas')->nullable();
            $table->float('valor_parcela', 10, 2)->nullable();
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
        Schema::dropIfExists('consorcios_parcelas');
    }
}
