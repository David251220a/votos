<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consejal extends Model
{
    use HasFactory;

    protected $table = 'consejal';

    public $timestamps= false;

    protected $guarded = [];

    public function lista()
    {
        return $this->belongsTo(Lista::class, 'Id_Lista', 'Id_Lista');
    }
}
