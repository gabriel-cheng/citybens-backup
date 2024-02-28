<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lances', function (Blueprint $table) {
            $table->foreignId('grupo')
                ->constrained('grupos')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->change();
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
            $table->dropColumn('grupo');
        });
    }
}
