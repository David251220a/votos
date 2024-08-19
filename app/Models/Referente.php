<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referente extends Model
{
    use HasFactory;

    protected $table = 'referentes';          

    protected $guarded = [];

    public function persona()
    {
        return $this->hasOne(Padron::class, 'Cod_Padron', 'Cod_Padron');
    }
    
}
