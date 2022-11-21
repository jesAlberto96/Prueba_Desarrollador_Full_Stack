<?php

namespace App\Repositories;

use App\Models\CargosEmpleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CargosEmpleadosRepository
{
    public function getAll() 
    {
        return CargosEmpleado::with('empleado')
            ->with('cargo')
            ->with('area')
            ->with('role')
            ->with('empleado_jefe')
            ->get();
    }

    public function getAllJefes() 
    {
        return CargosEmpleado::with('empleado')
            ->with('cargo')
            ->with('area')
            ->with('role')
            ->where('role_id', 1)
            ->groupBy('empleado_id')
            ->get();
    }

    public function getByID($id) 
    {
        return CargosEmpleado::with('empleado')
            ->with('cargo')
            ->with('area')
            ->with('role')
            ->with('empleado_jefe')
            ->find($id);
    }

    public function updateOrCreate($where, $data)
    {
        return CargosEmpleado::updateOrCreate($where, $data);
    }

    public function firstOrCreate($where, $data){
        return CargosEmpleado::firstOrCreate($where, $data);
    }

    public function update(CargosEmpleado $empleado, Request $request){
        return $empleado->update($request->input());
    }

    public function delete(CargosEmpleado $empleado){
        return $empleado->delete();
    }
}