<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAdministradorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('administradoras', function (Blueprint $table) {
            $table->string('tipos_lance')->nullable()->after('dia_assembleia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('administradoras', function (Blueprint $table) {
            $table->dropColumn('tipos_lance');
        });
    }
}
