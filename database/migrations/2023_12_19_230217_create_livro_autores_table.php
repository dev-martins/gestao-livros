<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livro_autores', function (Blueprint $table) {
            $table->unsignedInteger('LivroCodL');
            $table->unsignedInteger('AutorCodAu');
            $table->timestamps();

            $table->foreign('LivroCodL')->references('CodL')->on('livros')->onDelete('cascade');
            $table->foreign('AutorCodAu')->references('CodAu')->on('autores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_autors');
    }
};
