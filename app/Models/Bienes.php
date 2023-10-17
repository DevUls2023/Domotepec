<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bienes extends Model
{

    use HasFactory;

    protected $fillable = [
        'nombre', 'costo', 'descripcion', 'id_sucursal', 'id_empresa', 'stock',
    ];

}