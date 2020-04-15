<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('suplente_id')->unsigned();
            $table->integer('puesto_id')->unsigned();
            $table->integer('servicio_id')->unsigned();
            $table->integer('unidad_id')->unsigned();
            $table->enum('tipo', ['Guardia', 'Suplencia'])->default('Suplencia');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('qna');
            $table->float('monto');
            $table->integer('empleado_id')->unsigned();
            $table->integer('incidencia_id')->unsigned();

            $table->timestamps();

            $table->foreign('suplente_id')->references('id')->on('suplentes');  
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('unidad_id')->references('id')->on('unidads');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('incidencia_id')->references('id')->on('incidencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reports');
    }
}
