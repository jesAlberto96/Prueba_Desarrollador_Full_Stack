<?php

namespace App\Http\Controllers\CargosEmpleados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\AppRepository;
use App\Repositories\EmpleadosRepository;
use App\Repositories\CargosEmpleadosRepository;
use App\Models\CargosEmpleado;

class CargosEmpleadoController extends Controller
{
    public function __construct()
    {
        $this->appRepository = new AppRepository;
        $this->empleadosRepository = new EmpleadosRepository;
        $this->cargosEmpleadosRepository = new CargosEmpleadosRepository;
    }

    public function index()
    {
        return view("cargosEmpleados.index", $this->setParams());
    }

    private function setParams(){
        return [
            "data" => $this->cargosEmpleadosRepository->getAll(),
            "empleados" => $this->empleadosRepository->getAll(['id', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'departamentoNacimiento', 'ciudadNacimiento']),
            "cargos" => $this->appRepository->getAllCargos(),
            "roles" => $this->appRepository->getAllRoles(),
            "areas" => $this->appRepository->getAllAreas(),
            "jefes" => $this->cargosEmpleadosRepository->getAllJefes(),
        ];
    }

    public function store(Request $request)
    {
        $this->cargosEmpleadosRepository->updateOrCreate(
            [
                'empleado_id' => $request->empleado_id,
                'cargo_id' => $request->cargo_id
            ], 
            [
                'area_id' => $request->area_id,
                'role_id' => $request->role_id,
                'empleado_jefe_id' => $request->empleado_jefe_id,
            ]
        );

        return view("cargosEmpleados.index", $this->setParams());
    }

    public function show($id)
    {
        return response()->json($this->cargosEmpleadosRepository->getByID($id), 200);
    }

    public function destroy(CargosEmpleado $cargo)
    {
        return $this->cargosEmpleadosRepository->delete($cargo);
    }
}
