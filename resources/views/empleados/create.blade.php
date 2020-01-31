@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-link float-right" href="{{ route('empleados.index') }}">Regresar</a>
                    <h5 class="my-1">Crear Empleado</h5>
                </div>
                <form class="card-body" action="{{ route('empleados.store') }}" method="post">
                    @csrf()
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="codigo">Código *</label>
                                <input type="text" class="form-control @if($errors->has('codigo')) is-invalid @endif"
                                    name="codigo" value="{{ old('codigo') }}" id="codigo" required>
                                @if($errors->has('codigo'))
                                <div class="invalid-feedback">
                                  {{$errors->first('codigo')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre *</label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" id="nombre" required
                                    class="form-control @if($errors->has('nombre')) is-invalid @endif">
                                @if($errors->has('nombre'))
                                <div class="invalid-feedback">
                                  {{$errors->first('nombre')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="telefono">Teléfono *</label>
                                <input type="text" name="telefono" value="{{ old('telefono') }}" id="telefono" required
                                    class="form-control @if($errors->has('telefono')) is-invalid @endif">
                                @if($errors->has('telefono'))
                                <div class="invalid-feedback">
                                  {{$errors->first('telefono')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="correo">Correo electrónico *</label>
                                <input type="email" name="correo" value="{{ old('correo') }}" id="correo" required
                                    class="form-control @if($errors->has('correo')) is-invalid @endif">
                                @if($errors->has('correo'))
                                <div class="invalid-feedback">
                                  {{$errors->first('correo')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="direccion">Direccion *</label>
                                <input type="text" name="direccion" value="{{ old('direccion') }}" id="direccion" required
                                    class="form-control @if($errors->has('direccion')) is-invalid @endif">
                                @if($errors->has('direccion'))
                                <div class="invalid-feedback">
                                  {{$errors->first('direccion')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="estado">Estado *</label>
                                <input type="text" name="estado" value="{{ old('estado') }}" id="estado" required
                                    class="form-control @if($errors->has('estado')) is-invalid @endif">
                                @if($errors->has('estado'))
                                <div class="invalid-feedback">
                                  {{$errors->first('estado')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="ciudad">Ciudad *</label>
                                <input type="text" name="ciudad" value="{{ old('ciudad') }}" id="ciudad" required
                                    class="form-control @if($errors->has('ciudad')) is-invalid @endif">
                                @if($errors->has('ciudad'))
                                <div class="invalid-feedback">
                                  {{$errors->first('ciudad')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <div class="form-group">
                                <label for="salario-dolares">Salario USD *</label>
                                <input type="number" name="salarioDolares" value="{{ old('salarioDolares') }}" id="salario-dolares" required min="0" max="99999999"
                                    class="form-control @if($errors->has('salarioDolares')) is-invalid @endif">
                                @if($errors->has('salarioDolares'))
                                <div class="invalid-feedback">
                                  {{$errors->first('salarioDolares')}}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col col-md-6 d-flex align-items-center">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <div>
                                    <input type="checkbox" name="activo" value="1" id="activo"
                                        @if(old('activo') == '1' || old('activo') === null) checked @endif>
                                    <label for="activo">Empleado activo</label>
                                </div>
                                @if($errors->has('activo'))
                                <div class="invalid-feedback">
                                  {{$errors->first('activo')}}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
