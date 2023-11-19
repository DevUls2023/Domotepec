<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'estado',
        'costo',
        'descripcion',
        'sucursal',
        'empresa',
        'stock',
        'imagen'
        // Puedes agregar más campos aquí si es necesario
    ];
}