<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tipo_ropa;
use App\Models\Marcas;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['tipo_ropa', 'marca', 'categoria'])->paginate(10);
        return view('admin.productos.index', compact('productos'));
    }

    public function create()
    {
        $tipo_ropa = Tipo_ropa::all();
        $marcas = Marcas::all();
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('tipo_ropa', 'marcas', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_tiporopa' => 'required|exists:tipo_ropas,id', // Asegúrate de que el nombre de la tabla y columna sea correcto
            'precio' => 'required|numeric',
            'id_marca' => 'required|exists:marcas,id',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id); // Encuentra el producto o lanza un error 404 si no existe
        $producto->delete(); // Elimina el producto de la base de datos

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }

    public function edit($id)
    {
        // Encuentra el producto por su clave primaria
        $producto = Producto::findOrFail($id);

        // Obtén todas las opciones para tipo de ropa, marcas y categorías
        $tipo_ropa = Tipo_ropa::all();
        $marcas = Marcas::all();
        $categorias = Categoria::all();

        // Retorna la vista de edición con el producto y las listas para los selectores
        return view('admin.productos.edit', compact('producto', 'tipo_ropa', 'marcas', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_tiporopa' => 'required|integer',
            'precio' => 'required|numeric',
            'id_marca' => 'required|integer',
            'id_categoria' => 'required|integer',
        ]);

        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);

        // Actualizar los datos del producto
        $producto->id_tiporopa = $request->id_tiporopa;
        $producto->precio = $request->precio;
        $producto->id_marca = $request->id_marca;
        $producto->id_categoria = $request->id_categoria;
        $producto->save();

        // Redireccionar a la lista de productos con un mensaje de éxito
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }



}
