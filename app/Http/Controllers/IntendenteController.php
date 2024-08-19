<?php

namespace App\Http\Controllers;

use App\Models\Intendente;
use App\Models\LocalMesa;
use App\Models\MesaVotacion;
use App\Models\VotoIntendente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IntendenteController extends Controller
{
    public function index()
    {
        $intendentes = Intendente::orderBy('orden', 'ASC')->get();

        return view('votacion.intendente', compact('intendentes'));
    }

    public function store(Request $request)
    {
        $id_user = auth()->id();        

        $request->validate([
            'id_mesa' => 'required',
            'total_votos' => 'required|numeric|min:0|not_in:0',
        ]);

        $existe_registro = VotoIntendente::where('Id_Local', $request->id_local)
        ->where('Id_Mesa', $request->id_mesa)
        ->first();

        if ($existe_registro) {                    
            return redirect()->route('intendente.index')->with('msj', 'Ya existe registro en este local: '.$existe_registro->local->Desc_Local.' y en este mesa: '.$existe_registro->Id_Mesa);
        }

        $intendente = $request->get('intendente');
        $votos = $request->get('votos');
        $cont = 0;        

        if ($request->file('acta')) {            
            $imagen = $request->acta->store('public/documentos');
        }else{
            $imagen = '';
        }

        while ($cont < count($intendente)) {            
            VotoIntendente::create([
                'Id_Local' => $request->id_local,
                'Id_Mesa' => $request->id_mesa,
                'Id_Intendente' => $intendente[$cont],
                'Votos' => $votos[$cont],
                'Fecha_Alta' =>  Carbon::now(),
                'Id_User' => $id_user,
                'imagen' => $imagen,
            ]);
            $cont = $cont + 1 ;  
        }        

        $id = MesaVotacion::where('Id_Local', $request->id_local)
        ->where('Id_mesa', $request->id_mesa)
        ->where('Tipo_Carga', 1)
        ->first();

        $id->Activo = 0;
        $id->save();

        return redirect()->route('intendente.index')->with('msj', 'Se guardo con exito!.');

    }
}
