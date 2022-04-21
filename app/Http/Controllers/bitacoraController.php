<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Models\turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class bitacoraController extends Controller
{
    public function index()
    {
        //Esta funcion hace una consulta a la tabla de bitacoras.
        //y devuelve la vista index de la carpeta bitacoras mostrando las consultas
        //y la ubicación de la carpeta queda en resources/view/
       $bitacoras = bitacora::orderby('created_at','desc')->get();
       return view('bitacoras.index',compact('bitacoras'));
    }

    public function generar()
    {
        //Esta funcion hace una consulta a la tabla de turnos.
        //donde retorna los turnos que fueron creados por el usuario autentificado 
        //y despues devuelve la vista generar de la carpeta bitacoras.
        $turnos = turno::where('id_creador',Auth::user()->id)->orderby('id','desc')->get();
        return view('bitacoras.generar',compact('turnos'));
    }

    public function pdf(request $request)
    {
        //Esta funcion lo que hace es que consulta a la tabla de turnos.
        //y mete las consultas a un archivo php con codigo html 
        //y despues genera un pdf a partir de ese archivo html
        $turnos = turno::where('id_creador',Auth::user()->id)->orderby('id','desc')->get();
        $pdf = Pdf::loadView('bitacoras.pdf',['turnos' => $turnos,'request' => $request]);
        $turnos = turno::where('id_creador',Auth::user()->id);
        $turnos->delete();
        return $pdf->download();
    }

    public function create()
    {
        //Devuelve la vista create de la carpeta bitacoras
        return view('bitacoras.create');
    }

    public function store(Request $request)
    {
        //Aqui recibe el formulario de la vista create
        //y sube lo que llego del formulario a la base de datos bigup
        //y por ultimo redirecciona a la ruta bitacoras.index
        $request->validate([
            'pdf' => 'required|file',
        ]);
        $pdf = $request->file('pdf')->store('public/bitacoras');
        $url = Storage::url($pdf);
        
        bitacora::create([
            'bitacora' => $url,
            'id_creador' => Auth::user()->id
        ]);
        return redirect()->route('bitacoras.index')->with('bitacoras','¡Bitacora creada con exito!');
    }
}
