@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-link float-right" href="{{ route('empleados.index') }}">Regresar</a>
                    <h5 class="my-1">Detalle empleado</h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Código</label>
                            <p>{{ $employe->id }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Nombre</label>
                            <p>{{ $employe->nombre }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Teléfono</label>
                            <p>{{ $employe->telefono }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Correo electrónico</label>
                            <p>{{ $employe->correo }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Dirección</label>
                            <p>{{ $employe->direccion }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Estado</label>
                            <p>{{ $employe->estado }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Ciudad</label>
                            <p>{{ $employe->ciudad }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Salario USD</label>
                            <p>{{ $employe->salarioDolares }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Salario MXN</label>
                            <p>{{ $employe->salarioPesos }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Salario USD proyectado en 6 meses</label>
                            <p>{{ $employe->salario_proyectado }}</p>
                        </div>
                        <div class="col col-md-6 form-group">
                            <label class="font-weight-bold">Activo</label>
                            <p>{{ $employe->activo ? 'Si' : 'No' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
