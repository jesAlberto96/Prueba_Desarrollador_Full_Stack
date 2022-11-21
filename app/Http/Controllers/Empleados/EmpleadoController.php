<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Repositories\EmpleadosRepository;
use App\Http\Requests\Empleados\StoreEmpleadosRequest;
use DataTables;

class EmpleadoController extends Controller
{

    public function __construct()
    {
        $this->empleadosRepository = new EmpleadosRepository;
    }

    public function index()
    {
        $data = $this->empleadosRepository->getAll(['id', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'departamentoNacimiento', 'ciudadNacimiento']);
        return view("empleados.index", ["data" => $data]);
    }

    public function store(StoreEmpleadosRequest $request)
    {
        $this->empleadosRepository->updateOrCreate(
            ['identificacion' => $request->identificacion], 
            [
                'nombres' => $request->nombres,
                'apellidos' => $request->apellidos,
                'direccion' => $request->direccion,
                'telefono' => $request->telefono,
                'departamentoNacimiento' => $request->departamentoNacimiento,
                'ciudadNacimiento' => $request->ciudadNacimiento,
            ]
        );

        $data = $this->empleadosRepository->getAll(['id', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'departamentoNacimiento', 'ciudadNacimiento']);

        return view("empleados.index", ["data" => $data]);
    }

    public function show(Empleado $empleado)
    {
        return response()->json($empleado, 200);
    }

    public function destroy(Empleado $empleado)
    {
        return $this->empleadosRepository->delete($empleado);
    }
}
