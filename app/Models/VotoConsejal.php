<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VotoConsejal extends Model
{
    use HasFactory;

    protected $table = 'votacion_consejal';    

    public $timestamps= false;

    protected $primarykey='Id_Votacion_Consejal';

    protected $guarded = [];

    public function getKeyName(){
        return "Id_Votacion_Consejal";
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'Id_Local', 'Id_Local');
    }

    public function conse()
    {
        return $this->belongsTo(Consejal::class, 'Id_Consejal', 'Id_Consejal');
    }
}
