@extends('layouts.dash')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Entrada</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('entradas.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('entradas.update', $entrada->id_entrada) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_proveedor">Proveedor:</label>
            <select name="id_proveedor" class="form-control" required>
                @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}" {{ $proveedor->id_proveedor == $entrada->id_proveedor ? 'selected' : '' }}>
                        {{ $proveedor->id_proveedor }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_producto">Producto:</label>
            <select name="id_producto" class="form-control" required>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id_producto }}" {{ $producto->id_producto == $entrada->id_producto ? 'selected' : '' }}>
                        {{ $producto->id_producto }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_ropa">Tipo de Ropa:</label>
            <select name="tipo_ropa" class="form-control" required>
                @foreach ($tiposRopa as $tipo)
                    <option value="{{ $tipo->id }}" {{ $tipo->id == $entrada->tipo_ropa ? 'selected' : '' }}>
                        {{ $tipo->tipo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="precio_entrada">Precio Entrada:</label>
            <input type="number" name="precio_entrada" class="form-control" value="{{ $entrada->precio_entrada }}" required>
        </div>

        <div class="form-group">
            <label for="fecha_entrada">Fecha Entrada:</label>
            <input type="date" name="fecha_entrada" class="form-control" value="{{ $entrada->fecha_entrada }}" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>

@endsection
