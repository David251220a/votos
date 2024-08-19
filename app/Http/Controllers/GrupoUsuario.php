<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrupoUsuario extends Controller
{
    public function index()
    {
        return view('grupo_usuario.index');
    }
}
