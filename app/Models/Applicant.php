<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public static $TURNO_CHOICES = [
        1 => 'Matutino',
        2 => 'Vespertino'
    ];

    public static $GENERO_CHOICES = [
        1 => 'Masculino',
        2 => 'Feminino',
        3 => 'Transgênero'
    ];
}
