@extends('layouts.app')

@section('content')
    <script>
        var data = {!! json_encode($data) !!};
    </script>

    <div class="row justify-content-center content-empleados">
        <div class="col-8 add" style="margin-left: 20vh;" align="right">
            <a href="#" data-bs-toggle="modal" data-bs-target="#empleado-modal"> <img src="{{ asset('img/app/icon-add.png') }}"> Agregar</a>
        </div>
        <div class="col-8" style="margin-left: 20vh;">
            <div class="card">
                <div class="card-header">Cargos</div>

                <div class="card-body">
                    <table id="empleados" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Identificación</th>
                                <th>Area</th>
                                <th>Cargo</th>
                                <th>Rol</th>
                                <th>Jefe</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{!! $item->empleado->nombres !!} {!! $item->empleado->apellidos !!}</td>
                                    <td>{!! $item->empleado->identificacion !!}</td>
                                    <td>{!! $item->area->name !!}</td>
                                    <td>{!! $item->cargo->name !!}</td>
                                    <td>{!! $item->role->name !!}</td>
                                    <td>{!! $item->empleado_jefe->nombres ?? '' !!} {!! $item->empleado_jefe->apellidos ?? '' !!}</td>
                                    <td>
                                        <a class="icon-table" href="#" data-bs-toggle="modal" onclick="getEmpleado({!! $item->id !!})"> <img src="{{ asset('img/app/icon-editar.png') }}"></a>
                                        <a class="icon-table" href="#" data-bs-toggle="modal" onclick="deleteEmpleado({!! $item->id !!})"> <img src="{{ asset('img/app/icon-borrar.png') }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="empleado-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Cargo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form id="form-register" method="POST" action="{{ route('cargos.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <label for="empleado_id" class="form-label">Empleado</label>
                                    <select class="form-select" aria-label="Default select example" id="empleado_id" name="empleado_id" required>
                                        <option selected hidden>Seleccione ...</option>
                                        @foreach ($empleados as $item)
                                            <option value="{!! $item->id !!}">{!! $item->nombres !!} {!! $item->apellidos !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="area_id" class="form-label">Areá</label>
                                    <select class="form-select" aria-label="Default select example" id="area_id" name="area_id" required>
                                        <option selected hidden>Seleccione ...</option>
                                        @foreach ($areas as $item)
                                            <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="cargo_id" class="form-label">Cargo</label>
                                    <select class="form-select" aria-label="Default select example" id="cargo_id" name="cargo_id" required>
                                        <option selected hidden>Seleccione ...</option>
                                        @foreach ($cargos as $item)
                                            <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="role_id" class="form-label">Rol</label>
                                    <select class="form-select" aria-label="Default select example" id="role_id" name="role_id" required>
                                        <option selected hidden>Seleccione ...</option>
                                        @foreach ($roles as $item)
                                            <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="empleado_jefe_id" class="form-label">Jefe</label>
                                    <select class="form-select" aria-label="Default select example" id="empleado_jefe_id" name="empleado_jefe_id" required>
                                        <option selected hidden>Seleccione ...</option>
                                        @foreach ($jefes as $item)
                                            <option value="{!! $item->empleado->id !!}">{!! $item->empleado->nombres ?? '' !!} {!! $item->empleado->apellidos ?? '' !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" form="form-register">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <link href="{{ asset('css/cargos/styles.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/cargos/cargos.js') }}" defer></script>
@endsection
