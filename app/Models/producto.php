<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_producto';
    protected $fillable = ['nombre', 'descripcion', 'precio', 'id_categoria', 'unidad_medida'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'id_producto', 'id_producto');
    }

    public function tiendas()
    {
        return $this->belongsToMany(Tienda::class, 'inventarios', 'id_producto', 'id_tienda')
            ->withPivot('cantidad', 'fecha_actualizacion');
    }
}
