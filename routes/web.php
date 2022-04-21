<?php

use App\Http\Controllers\bitacoraController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\gestionar_UsuarioController;
use App\Http\Controllers\ingresoController;
use App\Http\Controllers\soldadoController;
use App\Http\Controllers\turnosControler;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ingresoController::class)->name('inicio');

Route::middleware(['auth:sanctum', 'verified','isSoldado'])
->get('/home', homeController::class)
->middleware('can:consultar_info')
->name('home');

Route::get('soldado',soldadoController::class)->middleware('can:soldadoTurno')->name('soldado');

//middleware(['auth:sanctum', 'verified',]) este middleware lo que hace es que verifica si el usuario que entra a la ruta esta autentificado
//->middleware('can:') Este middleware revisa si el usuario que esta ingresando a la ruta tiene los permisos para poder ingresar


//Gestionar users
        Route::get('gestionar-user/crear-usuario',[gestionar_UsuarioController::class,'create'])->middleware('can:crear_usuario')
                ->middleware(['auth:sanctum', 'verified',])
                ->name('G-userCreate');
                
        Route::post('gestionar-user/crear-usuario.store',[gestionar_UsuarioController::class,'store'])
                ->middleware('can:crear_usuario')
                ->middleware(['auth:sanctum', 'verified',])
                ->name('G-userCreate.store'); 
        Route::get('gestionar-user/mostrar', [gestionar_UsuarioController::class,'show'])
                ->middleware('can:crear_usuario')
                ->middleware(['auth:sanctum', 'verified',])
                ->name('user.mostrar');;
        Route::delete('gestionar-user/mostrar/{id}', [gestionar_UsuarioController::class,'destroy'])
                ->middleware('can:crear_usuario')
                ->middleware(['auth:sanctum', 'verified',])
                ->name('user.destroy');

        Route::get('gestionar-user/mostrar/{id}',[gestionar_UsuarioController::class,'update'])
                ->middleware('can:crear_usuario')
                ->middleware(['auth:sanctum', 'verified',])
                ->name('user.update.show');

        Route::put('gestionar-user/update/{id}',[gestionar_UsuarioController::class,'updateStore'])
                ->middleware('can:crear_usuario')
                ->middleware(['auth:sanctum', 'verified',])
                ->name('user.update.store');
        Route::get('gestionar-user/desactivados',[gestionar_UsuarioController::class,'desactivados'])
                ->middleware('can:crear_usuario')
                ->name('user.desactivados');

//Turnos de vigilancia

        Route::get('turnos',[turnosControler::class,'index'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('turnos.index');

        Route::post('turnos/crear/store',[turnosControler::class,'store'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('turno');

        Route::get('turnos/crear',[turnosControler::class,'create'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('turnos.create');

        Route::delete('turnos/store.delete/{id}',[turnosControler::class,'destroy'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('turnos.destroy');

        Route::get('turnos/mostrar/{id}',[turnosControler::class,'show'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('turnos.show');

//Bitacoras
        Route::get('bitacoras',[bitacoraController::class,'index'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('bitacoras.index');

        Route::get('bitacoras/crear',[bitacoraController::class,'generar'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('bitacoras.generar');

        Route::get('bitacoras/pdf',[bitacoraController::class,'pdf'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('bitacoras.pdf');

        Route::get('bitacora/cargar',[bitacoraController::class,'create'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('bitacoras.create');
        
        Route::post('bitacoras/cargar',[bitacoraController::class,'store'])
                ->middleware(['can:t_vigilancia','auth:sanctum','verified'])
                ->name('bitacoras.store');




        






