<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('rede_social')->nullable();
            $table->unsignedBigInteger('seq_cidade')->nullable();
            $table->unsignedBigInteger('id_user_cadastro')->nullable();
            $table->date('data_cadastro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha');
    }
}
