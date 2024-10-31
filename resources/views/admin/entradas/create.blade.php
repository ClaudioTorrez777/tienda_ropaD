@extends('layouts.dash')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agregar Nueva Entrada</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('home') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('entradas.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="id_proveedor">Proveedor:</label>
                    <select name="id_proveedor" class="form-control" required>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->id_proveedor }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_producto">Producto:</label>
                    <select name="id_producto" class="form-control" required>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id_producto }}">{{ $producto->id_producto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_tiporopa">Tipo de Ropa:</label>
                    <select name="id_tiporopa" class="form-control" required>
                        @foreach ($tiposRopa as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="precio_entrada">Precio Entrada:</label>
                    <input type="number" step="0.01" name="precio_entrada" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="fecha_entrada">Fecha Entrada:</label>
                    <input type="date" name="fecha_entrada" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Guardar Entrada</button>
            </div>
        </div>
    </form>

@endsection
