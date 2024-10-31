@extends('layouts.dash') <!-- Cambiar el layout según el nuevo diseño -->

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Productos</h2> <!-- Título de la página -->
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('productos.create') }}"> Agregar Producto</a>
                <a class="btn btn-primary" href="{{ route('home') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $i = 0; // Inicializar la variable $i
    @endphp

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Tipo de Ropa</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Categoría</th>
            @if(auth()->user()->hasAnyRole(['admin', 'empleado'])) <!-- Verificar roles para mostrar acciones -->
            <th width="280px">Acciones</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($productos as $producto)
            <tr>
                <td>{{ ++$i }}</td> <!-- Incrementar el contador -->
                <td>{{ $producto->tipo_ropa->tipo }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->marca->marca }}</td>
                <td>{{ $producto->categoria->categoria }}</td>
                <td>
                    @if(auth()->user()->hasAnyRole(['admin', 'empleado']))
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                            <a class="btn btn-info" href="{{ route('productos.show', $producto->id_producto) }}">Mostrar</a>
                            <a class="btn btn-primary" href="{{ route('productos.edit', $producto->id_producto) }}">Editar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $productos->links() !!} <!-- Paginación -->

@endsection
