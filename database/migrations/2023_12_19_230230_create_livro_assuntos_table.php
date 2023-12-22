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
        Schema::create('livro_assuntos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('LivroCodL');
            $table->unsignedInteger('AssuntoCodAs');
            $table->timestamps();

            $table->foreign('LivroCodL')->references('CodL')->on('livros')->onDelete('cascade');
            $table->foreign('AssuntoCodAs')->references('CodAs')->on('assuntos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livro_assuntos');
    }
};
