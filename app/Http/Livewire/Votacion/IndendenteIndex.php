<?php

namespace App\Http\Livewire\Votacion;

use App\Models\Local;
use App\Models\MesaVotacion;
use Livewire\Component;

class IndendenteIndex extends Component
{
    public $id_mesa, $id_local;

    public function mount()
    {                
        $this->id_local = 0;
        $this->id_mesa = 0;
    }
    
    public function render()
    {
        $local_votacion = Local::orderBy('Orden', 'ASC')->get();
        $mesa = MesaVotacion::where('Id_Local', $this->id_local)
        ->where('Tipo_Carga', 1)
        ->where('Activo', 1)
        ->get();

        if (count($mesa) > 0){
            $this->id_mesa = $mesa[0]->Id_Mesa;
        }else{
            $this->id_mesa = null;
        }
        return view('livewire.votacion.indendente-index', compact('local_votacion', 'mesa'));
    }
}
