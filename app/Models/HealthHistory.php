<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthHistory extends Model
{
    public static $TIPO_REGISTRO_CHOICES = [
        1 => 'Diagnóstico físico',
        2 => 'Diagnóstico mental',
        3 => 'Acompanhamento profissional',
        4 => 'Uso continuo de medicamentos',
        5 => 'Alergias'];

}
