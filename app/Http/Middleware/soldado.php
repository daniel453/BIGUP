<?php

namespace App\Http\Middleware;

use App\Models\model_has_role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\role;

class soldado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user()->id;
        $rol = model_has_role::where('model_id',$user)->first();
        $rol = role::find($rol->role_id);
        if($rol->name == 'soldado'){
            return redirect()->route('soldado');
        }
        return $next($request);
    }
}
