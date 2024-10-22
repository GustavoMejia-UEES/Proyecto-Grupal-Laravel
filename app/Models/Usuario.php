<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function resenas()
    {
        return $this->hasMany(Resena::class);
    }
}
