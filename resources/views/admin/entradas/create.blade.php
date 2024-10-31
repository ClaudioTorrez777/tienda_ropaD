@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Entrada</h1>

        <form action="{{ route('entradas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_proveedor" class="form-label">Proveedor</label>
                <select name="id_proveedor" id="id_proveedor" class="form-control" required>
                    @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->id_proveedor }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_producto" class="form-label">Producto</label>
                <select name="id_producto" id="id_producto" class="form-control" required>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->id_producto }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="precio_entrada" class="form-label">Precio de Entrada</label>
                <input type="number" step="0.01" name="precio_entrada" id="precio_entrada" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fecha_entrada" class="form-label">Fecha de Entrada</label>
                <input type="date" name="fecha_entrada" id="fecha_entrada" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
@endsection
