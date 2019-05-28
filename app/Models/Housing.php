<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housing extends Model
{
    public static $DOMICILIO_CHOICES = [
        1 => 'Casa',
        2 => 'Apartamento',
        3 => 'Sobrado',
    ];

    public static $PROPRIEDADE_CHOICES = [
        1 => 'Própria',
        2 => 'Alugada',
        3 => 'Emprestada'
    ];

    public static $EFICACAO_CHOICES = [
        1 => 'Alvenaria',
        2 => 'Madeira',
        3 => 'Híbrido'
    ];

    public static $STATUS_CHOICES = [
        1 => 'Individual',
        2 => 'Coletivo',
        3 => 'Não tem'
    ];

}
