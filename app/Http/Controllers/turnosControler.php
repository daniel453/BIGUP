<?php

namespace App\Http\Controllers;

use App\Models\model_has_role;
use App\Models\turno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class turnosControler extends Controller
{
    public function index()
    {
        //Devuelve la vista consultar-turnos
        $suboficiales = model_has_role::where('role_id','>',1)->get();
        return view('turnosVigilancia.consultar-turnos',compact('suboficiales'));
    }

    public function create()
    {
        //devuelve la vista Crear-Turnos 
        $soldados = model_has_role::where('role_id',1)->get();
        $turnos = turno::where('id_creador',Auth::user()->id)->orderby('id','desc')->get();
        $turnosCountable = count($turnos);
        return view('turnosVigilancia.Crear-Turnos',compact('soldados','turnos','turnosCountable'));
    }
    
    public function show($id)
    {
        //devuelve la vista show-turnos
        $turnos = turno::where('id_creador',$id)->get();
        $user = User::where('id',$id)->first();
        return view('turnosVigilancia.show-turnos',compact('turnos','user'));
    }

    public function store(Request $request)
    {
        //valida lo que llego del formulario y inserta el turno a la base de datos
        $request->validate([
            'soldado' => 'required||unique:App\Models\turno,id_soldado||exists:App\Models\User,id',
            'horario' => 'required',
            'ubicacion' => 'required',
            'fecha' => 'required'
        ]);

        turno::create([
            'ubicacion' => $request->ubicacion,
            'fecha' => $request->fecha,
            'horario' => $request->horario,
            'id_soldado' => $request->soldado,
            'id_creador' => Auth::user()->id,
            'cod_batallon' => '37'
        ]);

        return redirect()->route('turnos.create')->with('turno','creado');   
    }

    public function destroy($id)
    {
        //llega por la url la id del turno a eliminar y 
        //luego lo elimina segun la condicion de cumpla
        if ($id == Auth::user()->id) {
            $turnos = turno::where('id_creador',$id);
            $turnos->delete();
            return redirect()->route('turnos.create')->with('turnoDelete','hola');
        }else{
            return redirect()->route('turnos.create');
        }
    }
}
