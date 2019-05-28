<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        "nis_familiar",
        "cras_referencia",
        "bolsa_familia"
    ];

    protected $casts = [
        "bolsa_familia" => "boolean"
    ];
}
