<?php

namespace App\Http\Controllers;

use App\Models\Consejal;
use App\Models\Lista;
use App\Models\MesaVotacion;
use App\Models\Ordenes;
use App\Models\VotoConsejal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsejalController extends Controller
{
    public function index()
    {        
        $listas = Lista::where('estado', 1)
        ->orderBy('orden', 'ASC')
        ->whereBetween('Id_Lista', [11, 90])
        ->get();
        
        $ordenes = Consejal::select('Orden')
        ->whereBetween('Id_Lista', [11, 90])
        ->groupBy('Orden')
        ->orderBy('Orden')
        ->get();

        return view('votacion.consejal', compact('listas', 'ordenes'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'mesa_id' => 'required',
            'total_votos' => 'required|numeric|min:0|not_in:0',
        ]);

        $existe_registro = VotoConsejal::where('Id_Mesa', $request->mesa_id)
        ->where('Id_Local', $request->local_votacion_id)
        ->first();

        if ($existe_registro) {
            return redirect()->route('consejal.index')->with('msj', 'Ya existe registro en este local: '.$existe_registro->local->Desc_Local.' y en este mesa: '.$request->mesa_id);
        }
        
        $votos = $request->get('votos');

        $lista = $request->get('lista');
        $orden = $request->get('orden');        

        $cont = 0;
        $cont_votos = 0;

        if ($request->file('acta')) {            
            $imagen = $request->acta->store('public/documentos');
        }else{
            $imagen = '';
        }

        while($cont < count($orden)){

            $cont_lista = 0;

            while($cont_lista < count($lista)){

                $consejal = Consejal::where('Id_Lista', $lista[$cont_lista])
                ->where('Orden', $orden[$cont])
                ->first();                

                VotoConsejal::create([
                    'Id_Local' => $request->local_votacion_id,
                    'Id_Mesa' => $request->mesa_id,
                    'Id_Consejal' => $consejal->Id_Consejal,
                    'Votos' => $votos[$cont_votos],
                    'Fecha_Alta' =>  Carbon::now(),
                    'Id_User' => auth()->user()->id,
                    'imagen' => $imagen,
                ]);

                $cont_lista = $cont_lista + 1 ;
                $cont_votos = $cont_votos + 1 ;
                
            }
            
            $cont = $cont + 1 ;
        }
        // VALOR DE A COMPUTAR
        VotoConsejal::create([
            'Id_Local' => $request->local_votacion_id,
            'Id_Mesa' => $request->mesa_id,
            'Id_Consejal' => 997,
            'Votos' => $request->voto_computar_dato,
            'Fecha_Alta' =>  Carbon::now(),
            'Id_User' => auth()->user()->id,
            'imagen' => $imagen,
        ]);

        // VALOR DE A BLANCO
        VotoConsejal::create([
            'Id_Local' => $request->local_votacion_id,
            'Id_Mesa' => $request->mesa_id,
            'Id_Consejal' => 998,
            'Votos' => $request->voto_blanco_dato,
            'Fecha_Alta' =>  Carbon::now(),
            'Id_User' => auth()->user()->id,
            'imagen' => $imagen,
        ]);

        // VALOR DE A NULO
        VotoConsejal::create([
            'Id_Local' => $request->local_votacion_id,
            'Id_Mesa' => $request->mesa_id,
            'Id_Consejal' => 999,
            'Votos' => $request->voto_nulos_dato,
            'Fecha_Alta' =>  Carbon::now(),
            'Id_User' => auth()->user()->id,
            'imagen' => $imagen,
        ]);

        $id = MesaVotacion::where('Id_Local', $request->local_votacion_id)
        ->where('Id_mesa', $request->mesa_id)
        ->where('Tipo_Carga', 2)
        ->first();

        $id->Activo = 0;
        $id->save();

        return redirect()->route('consejal.index')->with('msj', 'Se guardo con exito!.');
    }
}
