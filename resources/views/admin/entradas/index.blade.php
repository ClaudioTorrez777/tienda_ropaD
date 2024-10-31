@extends('layouts.dash')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestión de Entradas</h2>
            </div>
            <div class="pull-right">
                @role('admin')
                <a class="btn btn-success" href="{{ route('entradas.create') }}"> Agregar Nueva Entrada</a>
                @endrole
                <a class="btn btn-primary" href="{{ route('home') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @php
        $i = 0; // Inicializar la variable $i
    @endphp

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>No</th>
            <th>Proveedor</th>
            <th>Producto</th>
            <th>Tipo de Ropa</th>
            <th>Precio Entrada</th>
            <th>Fecha Entrada</th>
            @role('admin')
            <th width="280px">Acciones</th>
            @endrole
        </tr>
        </thead>
        <tbody>
        @foreach ($entradas as $entrada)
            <tr>
                <td>{{ ++$i }}</td>
                <!-- Aquí se muestran los nombres en lugar de los IDs -->
                <td>{{ $entrada->id }}</td>
                <td>{{ $entrada->proveedor->id_proveedor }}</td>
                <td>{{ $entrada->producto->id_producto }}</td>
                <td>{{ $entrada->tipo_ropa->tipo }}</td>
                <td>{{ $entrada->precio_entrada }}</td>
                <td>{{ $entrada->fecha_entrada }}</td>
                <td>
                    @role('admin')
                    <a class="btn btn-primary" href="{{ route('entradas.edit', $entrada) }}">Editar</a>
                    <form action="{{ route('entradas.destroy', $entrada) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endrole
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {!! $entradas->links() !!} <!-- Si estás utilizando paginación -->

@endsection
