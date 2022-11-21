<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos_empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id');
            $table->foreignId('cargo_id');
            $table->foreignId('area_id');
            $table->foreignId('role_id');
            $table->foreignId('empleado_jefe_id')->nullable();

            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('empleado_jefe_id')->references('id')->on('empleados');

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
        Schema::dropIfExists('cargos_empleados');
    }
}
