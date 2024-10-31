<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Tipo_ropa;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with(['proveedor', 'producto', 'tipo_ropa'])->paginate(10);
        return view('admin.entradas.index', compact('entradas'));
    }


    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $tiposRopa = Tipo_ropa::all();
        return view('admin.entradas.create', compact('proveedores', 'productos', 'tiposRopa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_tiporopa' => 'required|exists:tipo_ropas,id',
            'precio_entrada' => 'required|numeric',
            'fecha_entrada' => 'required|date',
        ]);

        Entrada::create($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada creada exitosamente.');
    }

    public function edit(Entrada $entrada)
    {
        $proveedores = Proveedor::all();
        $productos = Producto::all();
        $tiposRopa = Tipo_ropa::all();
        return view('admin.entradas.edit', compact('entrada', 'proveedores', 'productos', 'tiposRopa'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_tiporopa' => 'required|exists:tipo_ropas,id',
            'precio_entrada' => 'required|numeric',
            'fecha_entrada' => 'required|date',
        ]);

        $entrada->update($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada exitosamente.');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada eliminada exitosamente.');
    }
}
