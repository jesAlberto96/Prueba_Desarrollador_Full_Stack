<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'nombres' => "Jefe",
            'apellidos' => "Jefe",
            'identificacion' => "Jefe",
            'direccion' => "Jefe",
            'telefono' => "Jefe",
            'departamentoNacimiento' => "Jefe",
            'ciudadNacimiento' => "Jefe",
        ]);
    }
}
