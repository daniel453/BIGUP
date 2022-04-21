<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ingresoController extends Controller
{
    public function __invoke()
    {
        if (Auth::user()) {
            return view('dashboard');
        }
        return redirect()->route('login');
    }
}
