<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsorciosSimulatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consorcios_simulator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('administradora_id')
                ->constrained('administradoras')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->float('credito', 10, 2)->nullable();
            $table->integer('taxa_administracao')->nullable();
            $table->string('bem');
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
        Schema::dropIfExists('consorcios_simulator');
    }
}
