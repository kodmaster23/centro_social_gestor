<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
    public static $GRAU_CHOICES = [
        1 => 'Pai',
        2 => 'Mãe',
        3 => 'Padrasto',
        4 => 'Madrasta',
        5 => 'Irmão',
        6 => 'Avô',
        7 => 'Tio',
        8 => 'Sobrinho',
        9 => 'Bisavô',
        10 => 'Primo',
        11 => 'Cunhado'
    ];
}
