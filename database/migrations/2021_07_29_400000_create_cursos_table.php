<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('nome_curso');
            $table->text('descricao_curso')->nullable();
            $table->double('valor_curso');
            $table->integer('qnt_max_inscritos');
            $table->date('data_inicio_inscricao');
            $table->date('data_fim_inscricao');
            $table->string('path_arquivo')->nullable();

            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
