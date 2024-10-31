<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';
    protected $fillable = ['id_proveedor', 'id_producto', 'id_tiporopa', 'precio_entrada', 'fecha_entrada'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function tipo_ropa()
    {
        return $this->belongsTo(Tipo_ropa::class, 'id_tiporopa');
    }
}
