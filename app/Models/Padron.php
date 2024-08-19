<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padron extends Model
{
    use HasFactory;

    protected $table = 'padron';    

    public $timestamps= false;

    protected $primarykey='CodPadron';

    protected $guarded = [];

    public function getKeyName(){
        return "CodPadron";
    }

    public function local_ob()
    {
        return $this->belongsTo(Local::class, 'local', 'Id_Local');
    }

    public function consulta_padron()
    {
        return $this->hasMany(PadronConsulta::class, 'padron_id', 'CodPadron')->orderBy('id', 'DESC');
    }
}
