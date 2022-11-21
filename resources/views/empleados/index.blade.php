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
                <div class="card-header">Empleados</div>

                <div class="card-body">
                    {{-- <table id="empleados" class="table table-striped table-bordered" style="width:100%"></table> --}}
                    <table id="empleados" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Identificación</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Departamento</th>
                                <th>Ciudad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{!! $item->nombres !!}</td>
                                    <td>{!! $item->apellidos !!}</td>
                                    <td>{!! $item->identificacion !!}</td>
                                    <td>{!! $item->direccion !!}</td>
                                    <td>{!! $item->telefono !!}</td>
                                    <td>{!! $item->departamentoNacimiento !!}</td>
                                    <td>{!! $item->ciudadNacimiento !!}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form id="form-register" method="POST" action="{{ route('empleados.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{ old('nombres') }}" required autofocus>
                                </div>

                                <div class="col-6">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="identificacion" class="form-label">Identificación</label>
                                    <input type="text" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion" name="identificacion" value="{{ old('identificacion') }}" required>
                                </div>
                                
                                <div class="col-6">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="departamentoNacimiento" class="form-label">Departamento</label>
                                    <input type="text" class="form-control @error('departamentoNacimiento') is-invalid @enderror" id="departamentoNacimiento" name="departamentoNacimiento" value="{{ old('departamentoNacimiento') }}" required>
                                </div>
                                
                                <div class="col-6">
                                    <label for="ciudadNacimiento" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control @error('ciudadNacimiento') is-invalid @enderror" id="ciudadNacimiento" name="ciudadNacimiento" value="{{ old('ciudadNacimiento') }}" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
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

    <link href="{{ asset('css/empleados/styles.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('js/empleados/empleados.js') }}" defer></script>
@endsection
