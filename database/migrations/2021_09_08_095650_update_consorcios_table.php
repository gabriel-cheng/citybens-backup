<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConsorciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consorcios', function (Blueprint $table) {
            $table->dropColumn('consorcio');
            $table->string('cliente')->nullable()->after('id');

            $table->foreignId('consultor')
                    ->constrained('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->after('id');

            $table->foreignId('grupo')
                    ->constrained('grupos')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->after('administradora');

            $table->string('cota')->after('administradora');
            $table->dropForeign('consorcios_deleted_by_foreign');
            $table->dropColumn('deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consorcios', function (Blueprint $table) {
            $table->string('consorcio', 255)->nullable()->after('id');
            $table->dropColumn('cota');
            $table->dropColumn('grupo');
            $table->dropColumn('consultor');
            $table->dropColumn('cliente');
        });
    }
}
