<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EstruturaInicial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('adm')->default(false);
            $table->boolean('bloqueado')->default(false);
            $table->string('NIF', 9)->nullable();
            $table->string('telefone')->nullable();
            $table->string('foto')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['adm', 'bloqueado', 'NIF', 'telefone', 'foto']);
        });
    }
}
