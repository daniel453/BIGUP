<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bitacora extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'bitacora',
        'id_creador'
    ];

    public function user()
    {
        $user = User::where('id',$this->id_creador)->first();
        return $user;
    }
}
