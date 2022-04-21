<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compañia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nombre_compania',
        'num_compania',
        'cod_batallon',
        'personal_compania'
    ];
}
