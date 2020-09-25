<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuplentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suplentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rfc')->length(13)->unique();
            $table->string('curp')->length(18);
            $table->bigInteger('clabe')->length(18);
            $table->string('apellido_pat');
            $table->string('apellido_mat');
            $table->string('nombre');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE suplentes AUTO_INCREMENT = 800801;');
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suplentes');
    }
}
