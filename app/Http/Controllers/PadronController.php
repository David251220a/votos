<?php

namespace App\Http\Controllers;

use App\Models\Padron;
use App\Models\PadronConsulta;
use App\Models\Referente;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

class PadronController extends Controller
{
    public function index(Request $request)
    {
        $searchtext = $request->searchtext;

        if($searchtext){
            $documento = str_replace('.', '', $searchtext);
            $data = Padron::where('cedula', $documento)->first();
            if ($data){
                PadronConsulta::create([
                    'padron_id' => $data->CodPadron,
                    'user_id' => auth()->user()->id,
                ]);
            }
        }else{
            $data = null;
            $searchtext = 0;
        }

        $referentes = Referente::all();        

        return view('padron.index', compact('data', 'searchtext', 'referentes'));
    }

    public function referente($searchtext, Request $request)
    {
        $request->validate([
            'documento' => 'required',
        ]);

        $data = Padron::where('cedula', $request->documento)->first();

        if ($data){
            $nombre = $data->apellido_nombre;
            $cod_padron = $data->CodPadron;
        }else{
            $nombre = $request->nombre;
            $cod_padron = 0;
        }

        $user = User::where('id', auth()->user()->id)->first();

        Referente::UpdateOrCreate([
            'documento' => $request->documento,
        ], 
        [
            'Cod_Padron' => $cod_padron,
            'documento' => $request->documento,
            'apellido_nombre' => $nombre,
            'user_id' => $user->id,
            'Intendente_Id' => $user->Id_Intendente,
            'Consejal_Id' => $user->Id_Consejal,

        ]);

        return redirect()->route('padron.index', ['searchtext' => $searchtext])->with('msj', 'Se creo con exito el referente.');
    }

    public function store(Request $request)
    {
        
        $user = User::where('id', auth()->user()->id)->first();        
        if($request->voto){
            $voto = 1;
        }else{
            $voto = 0;
        }        
        $data = Padron::find($request->cod_padron);
        $data->update([
            'referente_id' => $request->referente,
            'voto' => $voto,
            'candidato_consejal' => $user->Id_Consejal,
            'candidato_intendente' => $user->Id_Intendente,
        ]);

        return redirect()->route('padron.index')->with('msj', 'Guardado exitoso');
    }

    public function pdf(Padron $codPadron)
    {        
        $persona = $codPadron;
        $PDF = PDF::loadView('padron.pdf', compact('persona'));
                
        return $PDF->stream();
    }
}
