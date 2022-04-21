<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turno extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'id',
        'ubicacion',
        'fecha',
        'horario',
        'id_soldado',
        'id_creador',
        'cod_batallon'
    ];

    public function user_soldado()
    {
        $user = user::where('id',$this->id_soldado)->first();
        return $user;
    }
    public function user_creador()
    {
        $user = User::where('id',$this->id_creador)->first();
        return $user;
    }
}
