<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            $table->index('id_perfil');
            $table->foreign('id_perfil')->references('id')->on('perfil');
        });

        Schema::table('ficha', function (Blueprint $table) {
            $table->index('id_user_cadastro');
            $table->foreign('id_user_cadastro')->references('id')->on('users');
        });

        Schema::table('ficha', function (Blueprint $table) {
            $table->index('id_area_atuacao');
            $table->foreign('id_area_atuacao')->references('id')->on('area_atuacao');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
