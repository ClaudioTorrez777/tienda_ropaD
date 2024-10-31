<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Si el nombre de la tabla no sigue la convención de Laravel
    protected $table = 'proveedores'; // Asegúrate de que esté correcto

    protected $primaryKey = 'id_proveedor';
    protected $fillable = ['id_user', 'id_empresa'];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'id_empresa');
    }
}
