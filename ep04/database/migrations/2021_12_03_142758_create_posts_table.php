<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // Id auto incremento
            $table->bigIncrements('id');
            //chave criada paa o relacionamento, tipo igual ao campo na tabela users
            $table->unsignedBigInteger('author');
            // campos normais
            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->text('content');
            // Campo com gestão/geração controlados automáticamente pelo Laravel
            $table->timestamps();
            // Relacionamento, com o campo Id do Usuarios e ação: onDelete, ao deletar o usuário os posts relacionados a ele também serão deletados
            $table->foreign('author')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
