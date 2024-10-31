@extends('layouts.dash') <!-- Cambiar el layout según el nuevo diseño -->

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Producto</h2> <!-- Título de la página -->
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productos.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> <!-- Mostrar mensajes de error -->
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="id_tiporopa">Tipo de Ropa:</label>
                    <select name="id_tiporopa" class="form-control" required>
                        <option value="">Seleccione un tipo de ropa</option>
                        @foreach ($tipo_ropa as $tipo)
                            <option value="{{ $tipo->id }}" {{ $producto->id_tiporopa == $tipo->id ? 'selected' : '' }}>
                                {{ $tipo->tipo }}
                            </option> <!-- Opciones del select con selección predeterminada -->
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input type="text" name="precio" class="form-control" placeholder="Precio" value="{{ $producto->precio }}" required>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="id_marca">Marca:</label>
                    <select name="id_marca" class="form-control" required>
                        <option value="">Seleccione una marca</option>
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ $producto->id_marca == $marca->id ? 'selected' : '' }}>
                                {{ $marca->marca }}
                            </option> <!-- Opciones del select con selección predeterminada -->
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="id_categoria">Categoría:</label>
                    <select name="id_categoria" class="form-control" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ $producto->id_categoria == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->categoria }}
                            </option> <!-- Opciones del select con selección predeterminada -->
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Actualizar</button> <!-- Botón de envío -->
            </div>
        </div>
    </form>

@endsection
