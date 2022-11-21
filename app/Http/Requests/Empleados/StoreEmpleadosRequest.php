<?php

namespace App\Http\Requests\Empleados;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmpleadosRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'identificacion' => ['required', 'max:255', 'numeric',
                Rule::unique('empleados')
                    ->ignore($this->empleado)
                    ->where('identificacion', $this->identificacion)
            ],
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'departamentoNacimiento' => 'required',
            'ciudadNacimiento' => 'required',
        ];
    }
}
