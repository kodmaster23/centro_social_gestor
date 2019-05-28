<?php


namespace App\Domains\Institution\Repository;


use App\Extendable\Repository;
use App\Models\ExternalInstitution;

class ExternalInstitutionRepository extends Repository
{
    protected $model = ExternalInstitution::class;
    protected $searchableFields = [];

}