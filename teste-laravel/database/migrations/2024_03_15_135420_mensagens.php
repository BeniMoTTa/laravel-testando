<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mensagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('remetente_id');
            $table->foreign('remetente_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('destinatario_id');
            $table->foreign('destinatario_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->text('conteudo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('mensagens');
    }
};
