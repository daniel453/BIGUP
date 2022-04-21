<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\usuariosdesactivado;

class gestionar_UsuarioController extends Controller
{
    public function index()
    {
        //Retorna la vista index
        return view('GestionarUsers.Gestionar-U');
    }
    public function create()
    {
        //retorna la vista register
        return view('GestionarUsers.register');
    }
    public function store(request $request)
    {
        //Valida el formulario que llego de la vista create.
        //y despues inserta el usuario a la base de datos.
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'email' => 'required||unique:App\Models\User,email',
            'rh',
            'contingente' => 'required',
            'rango' => 'required',
            'compañia' => 'required'
        ]);
        User::create([
            'name' => "$request->name",
            'apellido' => "$request->apellido",
            'cedula' => "$request->cedula",
            'email' => "$request->email",
            'contingente' => "$request->contingente",
            'password' => bcrypt($request->cedula),
            'rh' => "$request->rh",
            'cod_compañia' => "$request->compañia",
            'cod_batallon' => "37"
        ])->assignRole("$request->rango");
        return redirect()->route('user.mostrar')->with('succesCreated','user');
            
    }

    public function show(request $request)
    {
        //Hace una consulta a la tabla user y luego devuelve la vista Gestionar-U-show
        $users =  User::select('id','name','apellido','cedula','contingente','email')
        ->where('name','like',"%$request->name%")
        ->where('apellido','like',"%$request->apellido%")  
        ->where('cedula','like',"%$request->cedula%")   
        ->where('contingente','like',"%$request->contingente%") 
        ->paginate(10);

        return view('GestionarUsers.Gestionar-U-show', compact('users','request'));
    }

    public function destroy(request $request, $id)
    {
        //valida lo que llego del formulario 
        //y borra el registro solicitado de la base de datos
        $request->validate([
            'novedad' => 'required'
        ]);
        $user = Auth::user()->id;
        
        if($user == $id){
            return redirect()->back()->with(['user' => '¡No se puede eliminar a usted mismo!']);
        }else{
            $user = User::find($id);
            usuariosdesactivado::create([
                'name' => "$user->name",
                'apellido' => "$user->apellido",
                'cedula' => "$user->cedula",
                'contingente' => "$user->contingente",
                'novedad' => "$request->novedad",
            ]);
            user::destroy($id);
            return redirect()->route('user.mostrar')->with('succes','user');
        }
         
    }
    public function update($id)
    {
        //Recibe una variable por la url y busca el id 
        //y devuelve la vista Gestionar-U-showUpdate mostrando el lo que llego de la consulta
        $user = User::find($id);
        return view('GestionarUsers.Gestionar-U-showUpdate',compact('user'));
    }


    
    public function updateStore(request $request,$id)
    {
        //Esta funcion lo que hace es actualizar el usuario del formulario
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'cedula' => 'required',
            'email' => 'required',
            'contingente' => 'required',
            'rango' => 'required'
        ]);
        $user = Auth::user()->id;

        if($user == $id){
            return redirect()->back()->with(['user' => '¡No se puede eliminar a usted mismo!']);
        }else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->apellido = $request->apellido;
            $user->cedula = $request->cedula;
            $user->email = $request->email;
            $user->contingente = $request->contingente;
            $user->syncRoles($request->rango);
            $user->save();
            return redirect()->route('user.mostrar')->with('succesU','actualizado');
        }
        
    }

    public function desactivados(Request $request){
        //Esta funcion muestra los usuarios que fueron desactivados 
        $users = usuariosdesactivado::where('name','like',"%$request->name%")
        ->where('apellido','like',"%$request->apellido%")  
        ->where('cedula','like',"%$request->cedula%")   
        ->where('contingente','like',"%$request->contingente%")           
        ->paginate(10);
        return view('GestionarUsers.user-desactivados',compact('users','request'));
    }
}
