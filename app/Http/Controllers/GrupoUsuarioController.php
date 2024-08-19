<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GrupoUsuarioController extends Controller
{
    public function index()
    {
        $data = Role::get();
        return view('grupo_usuario.index', compact('data'));
    }

    public function create()
    {
        return view('grupo_usuario.create');
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        return redirect()->route('rol.index')->with(['message' => 'Registro exitoso!']);
    }

    public function edit(Role $rol)
    {
        $permisos = Permission::orderBy('name')->get();
        return view('grupo_usuario.edit', compact('rol', 'permisos'));
    }

    public function update(Request $request, Role $rol)
    {
        $rol->syncPermissions($request->permissions);
        $rol->save();
        return redirect()->route('rol.index')->with(['message' => 'Registro exitoso!']);
    }

}
