@extends('layouts.dash')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD Example</h2>
            </div>
            <div class="pull-right">
                @role('admin')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endrole
                <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
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
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            @role('admin')
            <th width="280px">Action</th>
            @endrole
        </tr>

        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @role('admin')
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endrole
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}

@endsection
