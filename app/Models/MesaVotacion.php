<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesaVotacion extends Model
{
    use HasFactory;

    protected $table = 'local_mesa_votacion';

    public $timestamps= false;

    protected $guarded = [];
}
