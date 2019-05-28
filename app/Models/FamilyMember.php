<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    public static $ESTADO_CIVIL_CHOICES = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'União Estável',
        4 => 'Viúvo'
    ];
    public static $GENERO_CHOICES = [
        1 => 'Masculino',
        2 => 'Feminino',
        3 => 'Transgênero'
    ];

    public static $ESCOLARIDADE_CHOICES = [
        1 => 'Fundamental - Incompleto',
        2 => 'Fundamental - Completo',
        3 => 'Médio - Incompleto',
        4 => 'Médio - Completo',
        5 => 'Superior - Incompleto',
        6 => 'Superior - Completo',
        7 => 'Pós-graduação Lato senso - Incompleto',
        8 => 'Pós-graduação Lato senso - Completo',
        9 => 'Pós-graduação Stricto sensu, nível mestrado - Incompleto',
        10 => 'Pós-graduação Stricto sensu, nível mestrado - Completo',
        11 => 'Pós-graduação Stricto sensu, nível doutor - Incompleto',
        12 => 'Pós-graduação Stricto sensu, nível doutor - Completo'
    ];

    protected $fillable = [
        "nome",
        "sobrenome",
        "cpf",
        "idade",
        "estado_civil",
        "escolaridade",
        "genero",
        "profissao",
        "renda_mensal",
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
