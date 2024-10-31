<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // Asegúrate de que esté correcto
    protected $primaryKey = 'id_producto';
    protected $fillable = ['id_tiporopa', 'precio', 'id_marca', 'id_categoria'];

    public function tipo_ropa()
    {
        return $this->belongsTo(Tipo_ropa::class, 'id_tiporopa');
    }

    public function marca()
    {
        return $this->belongsTo(Marcas::class, 'id_marca');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
