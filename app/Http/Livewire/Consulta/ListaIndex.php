<?php

namespace App\Http\Livewire\Consulta;

use App\Models\Lista;
use App\Models\Local;
use App\Models\VotoConsejal;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ListaIndex extends Component
{
    public $tipo, $descripcion, $total, $local_id, $lista_id, $datos, $desc_lis;
    
    public function mount()
    {     
        $this->local_id = 0;
        $this->lista_id = 0;
        $this->desc_lis = '';
    }

    public function render()
    {
        if(($this->local_id == 0) && ($this->lista_id == 0)){
            $this->todos();
            $data = $this->datos;
        }
        if(($this->local_id <> 0) && ($this->lista_id == 0)){
            $this->solo_local();
            $data = $this->datos;
        }

        if(($this->local_id == 0) && ($this->lista_id <> 0)){
            $this->solo_lista();
            $data = $this->datos;
        }

        if(($this->local_id <> 0) && ($this->lista_id <> 0)){
            $this->juntos();
            $data = $this->datos;
        }

        $local = Local::orderBy('Orden', 'ASC')->get();
        if($this->local_id <> 0){
            $descripcion_Local = Local::where('Id_Local', $this->local_id)->first();
            $descripcion_Local = $descripcion_Local->Desc_Local;
        }else{
            $descripcion_Local = 'TODOS LOS LOCALES';
        }
        
        $lista = Lista::where('tipo', 2)->where('estado', 1)->get();        
        return view('livewire.consulta.lista-index', compact('local', 'descripcion_Local', 'lista', 'data'));
    }

    public function todos()
    {
        $this->datos = VotoConsejal::join('consejal AS a', 'a.Id_Consejal', '=', 'votacion_consejal.Id_Consejal')
        ->join('lista AS b', 'b.Id_Lista', '=', 'a.Id_Lista')
        ->select('a.Id_Lista', 'b.Desc_Lista', 'b.Alias'
        , DB::raw('SUM(votacion_consejal.Votos) AS Votos'))
        ->groupBy('a.Id_Lista', 'b.Desc_Lista', 'b.Alias')
        ->orderBy(DB::raw('SUM(votacion_consejal.Votos)'), 'DESC')
        ->get();

        $this->total = VotoConsejal::sum('Votos');
        $this->tipo = 1;
        $this->desc_lis = '';
    }

    public function solo_lista()
    {
        $this->datos = VotoConsejal::join('consejal AS a', 'a.Id_Consejal', '=', 'votacion_consejal.Id_Consejal')
        ->join('lista AS b', 'b.Id_Lista', '=', 'a.Id_Lista')
        ->select('a.Id_Lista', 'b.Desc_Lista', 'b.Alias', 'votacion_consejal.Id_Local'
        , DB::raw('SUM(votacion_consejal.Votos) AS Votos'))
        ->where('a.Id_Lista', $this->lista_id)
        ->groupBy('a.Id_Lista', 'b.Desc_Lista', 'b.Alias', 'votacion_consejal.Id_Local')
        ->orderBy(DB::raw('SUM(votacion_consejal.Votos)'), 'DESC')
        ->get();

        $this->total = VotoConsejal::join('consejal AS a', 'a.Id_Consejal', '=', 'votacion_consejal.Id_Consejal')        
        ->select('a.Id_Lista', 'votacion_consejal.*')
        ->where('a.Id_Lista', $this->lista_id)
        ->sum('votacion_consejal.Votos');
        $this->tipo = 2;
        $aux_desc_lis = Lista::where('Id_Lista', $this->lista_id)->first();
        $this->desc_lis = $aux_desc_lis->Desc_Lista . ' - '. $aux_desc_lis->Alias;
    }

    public function solo_local()
    {
        $this->datos = VotoConsejal::join('consejal AS a', 'a.Id_Consejal', '=', 'votacion_consejal.Id_Consejal')
        ->join('lista AS b', 'b.Id_Lista', '=', 'a.Id_Lista')
        ->select('a.Id_Lista', 'b.Desc_Lista', 'b.Alias', 'votacion_consejal.Id_Local'
        , DB::raw('SUM(votacion_consejal.Votos) AS Votos'))
        ->where('votacion_consejal.Id_Local', $this->local_id)
        ->groupBy('a.Id_Lista', 'b.Desc_Lista', 'b.Alias', 'votacion_consejal.Id_Local')
        ->orderBy(DB::raw('SUM(votacion_consejal.Votos)'), 'DESC')
        ->get();

        $this->total = VotoConsejal::where('Id_Local', $this->local_id)
        ->sum('Votos');        

        $this->tipo = 1;
    }

    public function juntos()
    {
        $this->datos = VotoConsejal::join('consejal AS a', 'a.Id_Consejal', '=', 'votacion_consejal.Id_Consejal')
        ->join('lista AS b', 'b.Id_Lista', '=', 'a.Id_Lista')
        ->select('a.Id_Lista', 'b.Desc_Lista', 'b.Alias', 'votacion_consejal.Id_Local'
        , DB::raw('SUM(votacion_consejal.Votos) AS Votos'))
        ->where('a.Id_Lista', $this->lista_id)
        ->where('votacion_consejal.Id_Local', $this->local_id)
        ->groupBy('a.Id_Lista', 'b.Desc_Lista', 'b.Alias', 'votacion_consejal.Id_Local')
        ->orderBy(DB::raw('SUM(votacion_consejal.Votos)'), 'DESC')
        ->get();

        $this->total = VotoConsejal::join('consejal AS a', 'a.Id_Consejal', '=', 'votacion_consejal.Id_Consejal')        
        ->select('a.Id_Lista', 'votacion_consejal.*')
        ->where('a.Id_Lista', $this->lista_id)
        ->where('votacion_consejal.Id_Local', $this->local_id)
        ->sum('votacion_consejal.Votos');
        $this->tipo = 1;
        $this->desc_lis = ''; 
    }
}
