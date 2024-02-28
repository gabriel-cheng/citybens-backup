<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLancesTableLanceFixo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lances', function (Blueprint $table) {
            $table->boolean('embutido')->after('valor_lance_total');
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
            $table->dropColumn('embutido');
        });
    }
}
