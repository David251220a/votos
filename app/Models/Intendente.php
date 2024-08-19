<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intendente extends Model
{
    use HasFactory;

    protected $table = 'intendente';    

    public $timestamps= false;

    protected $primarykey='Id_Intendente';

    protected $guarded = [];

    public function getKeyName(){
        return "Id_Intendente";
    }

    public function lista()
    {
        return $this->belongsTo(Lista::class, 'Id_Lista', 'Id_Lista');
    }
}
