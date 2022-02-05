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
        /*
        Schema::table('users', function (Blueprint $table) {
            $table->index('id_perfil');
            $table->foreign('id_perfil')->references('id')->on('perfil');
        });

        Schema::table('ficha', function (Blueprint $table) {
            $table->index('seq_cidade');
            $table->foreign('seq_cidade')->references('seq_cidade')->on('tb_cidade');
        });

        Schema::table('ficha', function (Blueprint $table) {
            $table->index('id_user_cadastro');
            $table->foreign('id_user_cadastro')->references('id')->on('users');
        });
        */
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
