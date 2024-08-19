<?php

namespace App\Http\Controllers;

use App\Models\Padron;
use App\Models\Referente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function votos()
    {
        return view('consulta.voto');
    }

    public function local()
    {
        return view('consulta.local');
    }

    public function lista()
    {
        return view('consulta.lista');
    }

    public function referente(Request $request)
    {
        if($request->referente){
            $referente = $request->referente;
        }else{            
            $referente = 1;
        }    
        $referentes = Referente::orderBy('id', 'ASC')->get();        
        if($referente == 1){
            $data = Padron::where('referente_id', '<>', 1)->paginate(20);
            $total = Padron::where('referente_id', '<>', 1)->count('CodPadron');
        }else{
            $data = Padron::where('referente_id',$referente)->paginate(20);
            $total = Padron::where('referente_id',$referente)->count('CodPadron');
        }
        
        return view('consulta.referente', compact('referentes', 'referente', 'data', 'total'));
    }

    public function mapa()
    {
        $data = Padron::find(1);
        return view('consulta.mapa', compact('data'));
    }

    public function mapa_store(Request $request)
    {
        
        $data = Padron::find(1);
        $data->ubicacion_a = $request->latitude;
        $data->ubicacion_b = $request->longitude;
        $data->update();

        return redirect()->route('consulta.mapa')->with('msj', 'Guardado con exito');
    }
}
