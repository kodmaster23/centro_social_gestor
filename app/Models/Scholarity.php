<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarity extends Model
{
    public static $TURNO_CHOICES = [
        1 => 'Matutino',
        2 => 'Vespertino'
    ];

    public static $SERIE_CHOICES = [
        1 => '1º',
        2 => '2º',
        3 => '3º',
        4 => '4º',
        5 => '5º',
        6 => '6º',
        7 => '7º',
        8 => '8º',
        9 => '9º',
    ];

}
