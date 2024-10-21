<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurante extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tienda';
    public $incrementing = false;
    protected $fillable = ['id_tienda', 'tipo_cocina', 'horario_apertura', 'horario_cierre'];

    public function tienda()
    {
        return $this->belongsTo(Tienda::class, 'id_tienda', 'id_tienda');
    }
}
