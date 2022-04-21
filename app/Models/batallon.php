<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batallon extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre_batallon',
        'num_batallon',
        'ubicacion',
    ];
}
