@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-link float-right" href="{{ route('empleados.create') }}">Crear</a>
                    <h5 class="my-1">Empleados</h5>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Salario USD</th>
                                    <th scope="col">Salario MXN</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employes as $employe)
                                <tr>
                                    <th scope="row">{{ $employe->id }}</th>
                                    <td>{{ $employe->codigo }}</td>
                                    <td>{{ $employe->nombre }}</td>
                                    <td>{{ $employe->salarioDolares }}</td>
                                    <td>{{ $employe->salarioPesos }}</td>
                                    <td>{{ $employe->correo }}</td>
                                    <td>{{ $employe->activo ? 'Si' : 'No' }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('empleados.show', $employe->id) }}" class="mr-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('empleados.edit', $employe->id) }}" class="mr-1">
                                            @if($employe->activo)
                                            <i class="fas fa-check-square"></i>
                                            @else
                                            <i class="far fa-square"></i>
                                            @endif
                                        </a>
                                        <a href="{{ route('empleados.edit', $employe->id) }}" class="mr-1">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a href="{{ route('empleados.show', $employe->id) }}" class="mr-1">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($employes->isEmpty())
                    <p class="text-center m-0">
                        No hay registros por mostrar
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
