<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotoIntendente extends Model
{
    use HasFactory;

    protected $table = 'votacion_intendente';    

    public $timestamps= false;

    protected $primarykey='Id_Votacion';

    protected $guarded = [];

    public function getKeyName(){
        return "Id_Votacion";
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'Id_Local', 'Id_Local');
    }

    public function inte()
    {
        return $this->belongsTo(Intendente::class, 'Id_Intendente', 'Id_Intendente');
    }
}
