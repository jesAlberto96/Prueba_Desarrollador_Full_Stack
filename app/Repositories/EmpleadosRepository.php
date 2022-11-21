<?php

namespace App\Repositories;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmpleadosRepository
{
    public function getAll($cols) 
    {
        return Empleado::all($cols);
    }

    public function getByID($id) 
    {
        return Empleado::find($id);
    }

    public function updateOrCreate($where, $data)
    {
        return Empleado::updateOrCreate($where, $data);
    }

    public function firstOrCreate($where, $data){
        return Empleado::firstOrCreate($where, $data);
    }

    public function update(Empleado $empleado, Request $request){
        return $empleado->update($request->input());
    }

    public function delete(Empleado $empleado){
        return $empleado->delete();
    }
}