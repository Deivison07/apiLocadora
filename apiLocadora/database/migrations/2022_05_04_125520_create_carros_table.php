<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);

            $table->unsignedBigInteger('fabricante_id')->nullable(); /* chave estr fabricante  */

            $table->enum('tipo', ['esportivo', 'urbano','estrada']);
            $table->enum('modelo', ['Conversível', 'Sedã','SUV','Picape']);
            $table->integer('numeroPortas')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fabricante_id')->references('id')->on('fabricantes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('carros', function (Blueprint $table) {
            $table->dropForeign('carros_fabricante_id_foreign');
            $table->dropSoftDeletes(); // removendo a coluna softDeletes
        });

        Schema::dropIfExists('carros');
    }
}
