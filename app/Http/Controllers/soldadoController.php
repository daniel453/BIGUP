<?php

namespace App\Http\Controllers;

use App\Models\turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class soldadoController extends Controller
{
    public function __invoke()
    {
        //retorna la vista de soldado con los datos del soldado
        $turno = turno::where('id_soldado',Auth::user()->id)->get();
        return view('Soldado',compact('turno'));
    }
}
