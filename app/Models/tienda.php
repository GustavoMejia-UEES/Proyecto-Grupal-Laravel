<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tienda extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tienda';
    protected $fillable = ['nombre', 'tipo', 'direccion', 'telefono', 'email'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_tienda', 'id_tienda');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'inventarios', 'id_tienda', 'id_producto')
            ->withPivot('cantidad', 'fecha_actualizacion');
    }

    public function restaurante()
    {
        return $this->hasOne(Restaurante::class, 'id_tienda', 'id_tienda');
    }

    public function farmacia()
    {
        return $this->hasOne(Farmacia::class, 'id_tienda', 'id_tienda');
    }

    public function supermercado()
    {
        return $this->hasOne(Supermercado::class, 'id_tienda', 'id_tienda');
    }
}
