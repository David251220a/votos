<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PadronConsulta extends Model
{
    use HasFactory;

    protected $table = 'padron_consulta';

    protected $primarykey='id';

    protected $guarded = [];

    public function getKeyName(){
        return "id";
    }

    // public function local_ob()
    // {
    //     return $this->belongsTo(Local::class, 'local', 'Id_Local');
    // }
}
