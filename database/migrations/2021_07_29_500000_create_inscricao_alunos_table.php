<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaoAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao_alunos', function (Blueprint $table) {
            $table->id();
           
            $table->string('status')->nullable();

            $table->double('valor_incricao')->nullable();
            
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');

            $table->foreignId('curso_id')->unique()->constrained('cursos')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricao_alunos');
    }
}
