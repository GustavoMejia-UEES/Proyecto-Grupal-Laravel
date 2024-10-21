<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supermercado extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tienda';
    public $incrementing = false;
    protected $fillable = ['id_tienda', 'secciones', 'promociones'];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'id_tienda', 'id_tienda');
    }
}
