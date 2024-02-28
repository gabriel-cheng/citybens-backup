<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLancesEmbutidoFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lances', function (Blueprint $table) {
            $table->decimal('porcentagem_lance_fixo', 5, 2)->nullable();
            $table->decimal('valor_lance_fixo', 10, 2)->nullable();
            $table->boolean('is_automatic')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lances', function (Blueprint $table) {
            $table->dropColumn('porcentagem_lance_fixo');
            $table->dropColumn('valor_lance_fixo');
            $table->dropColumn('is_automatic');
        });
    }
}
