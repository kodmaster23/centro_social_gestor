<?php


namespace App\Domains\Family\Repository;


use App\Extendable\Repository;
use App\Models\Family;

class FamilyRepository extends Repository
{
    protected $model = Family::class;
    protected $searchableFields = [
        ["field" => "nis_familiar"],
        ["field" => "bolsa_familia"]
    ];

}