<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->string('nombre');
            $table->decimal('salarioDolares', 10, 2)->unsigned();
            $table->decimal('salarioPesos', 10, 2)->unsigned();
            $table->string('direccion');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('correo');
            $table->boolean('activo')->default(0);
            $table->timestamp('eliminado')->nullable();
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
        Schema::dropIfExists('empleados');
    }
}
