<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dados extends Model
{
    protected $fillable = [
        'temperatura','humidade','percbateria','claridade','haMovimento','ledAceso'
    ];
}
