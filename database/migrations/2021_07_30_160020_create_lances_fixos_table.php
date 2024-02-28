<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLancesFixosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lances_fixos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grupo_id')
                ->constrained('grupos');
            $table->string('lance_percentual')->nullable();
            $table->float('lance_valor', 10, 2)->nullable();
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
        Schema::dropIfExists('lances_fixos');
    }
}
