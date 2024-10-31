{{-- resources/views/admin/entradas/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Entradas</h1>
    <a href="{{ route('entradas.create') }}" class="btn btn-primary">Crear Entrada</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entradas as $entrada)
            <tr>
                <td>{{ $entrada->id_entrada }}</td>
                <td>{{ $entrada->proveedor->nombre }}</td>
                <td>{{ $entrada->producto->nombre }}</td>
                <td>{{ $entrada->precio_entrada }}</td>
                <td>{{ $entrada->fecha_entrada }}</td>
                <td>
                    <a href="{{ route('entradas.edit', $entrada) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('entradas.destroy', $entrada) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
