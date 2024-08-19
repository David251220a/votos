<?php

namespace App\Http\Livewire\Votacion;

use App\Models\Local;
use App\Models\MesaVotacion;
use Livewire\Component;

class ConsejalVoto extends Component
{
    public $local_votacion_id, $mesa_id;

    public function mount()
    {                
        $this->local_votacion_id = 0;
        $this->mesa_id = 0;
    }

    public function render()
    {        
        $local_votacion = Local::orderBy('Orden', 'ASC')->get();
        $mesa = MesaVotacion::where('Id_Local', $this->local_votacion_id)
        ->where('Tipo_Carga', 2)
        ->where('Activo', 1)
        ->get();
        return view('livewire.votacion.consejal-voto', compact('mesa', 'local_votacion'));
    }
}
