<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class model_has_role extends Model
{
    use HasFactory;

    public function usuario()
    {
        $user = User::where('id',$this->model_id)->first();
        return $user;
    }
    public function tieneTurno()
    {
        $consulta = turno::where('id_creador',$this->model_id)->first();
        return $consulta;
    }
}
