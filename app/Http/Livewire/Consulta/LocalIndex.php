<?php

namespace App\Http\Livewire\Consulta;

use App\Models\Local;
use App\Models\VotoConsejal;
use App\Models\VotoIntendente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LocalIndex extends Component
{
    public $tipo, $descripcion, $total, $local_id;
    
    public function mount()
    {
        $this->tipo = 1;
        $this->local_id = 1;
    }

    public function render()
    {
        if($this->tipo == 1){
            $data = VotoIntendente::select('Id_Intendente', 'Id_Local'
            , DB::raw('SUM(Votos) AS Votos'))
            ->where('Id_Local', $this->local_id)
            ->groupBy('Id_Intendente', 'Id_Local')
            ->orderBy(DB::raw('SUM(Votos)'), 'DESC')
            ->get();

            $this->total = VotoIntendente::where('Id_Local', $this->local_id)->sum('Votos');
            $this->descripcion = 'Intendente';
        }else{
            $data = VotoConsejal::select('Id_Consejal', 'Id_Local'
            , DB::raw('SUM(Votos) AS Votos'))
            ->where('Id_Local', $this->local_id)
            ->groupBy('Id_Consejal', 'Id_Local')
            ->orderBy(DB::raw('SUM(Votos)'), 'DESC')
            ->get();

            $this->total = VotoConsejal::where('Id_Local', $this->local_id)->sum('Votos');            
            $this->descripcion = 'Consejal';
        }

        
        $local = Local::orderBy('Orden', 'ASC')->get();
        $descripcion_Local = Local::where('Id_Local', $this->local_id)->first();

        return view('livewire.consulta.local-index', compact('data', 'local', 'descripcion_Local'));
    }
}
