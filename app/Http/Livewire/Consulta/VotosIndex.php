<?php

namespace App\Http\Livewire\Consulta;

use App\Models\VotoConsejal;
use App\Models\VotoIntendente;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class VotosIndex extends Component
{
    public $tipo, $descripcion, $total;

    public function mount()
    {
        $this->tipo = 1;
    }

    public function render()
    {
        if($this->tipo == 1){
            $data = VotoIntendente::select('Id_Intendente' 
            , DB::raw('SUM(Votos) AS Votos'))
            ->groupBy('Id_Intendente')
            ->orderBy(DB::raw('SUM(Votos)'), 'DESC')
            ->get();

            $this->total = VotoIntendente::sum('Votos');
            $this->descripcion = 'Intendente';
        }else{
            $data = VotoConsejal::select('Id_Consejal'
            , DB::raw('SUM(Votos) AS Votos'))
            ->groupBy('Id_Consejal')
            ->orderBy(DB::raw('SUM(Votos)'), 'DESC')
            ->get();

            $this->total = VotoConsejal::sum('Votos');            
            $this->descripcion = 'Consejal';
        }
        return view('livewire.consulta.votos-index', compact('data'));
    }
}
