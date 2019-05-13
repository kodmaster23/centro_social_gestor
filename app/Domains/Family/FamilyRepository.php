<?php


namespace App\Domains\Family;


use App\Extendable\Repository;
use App\Models\Family;

class FamilyRepository extends Repository
{
    protected $model = Family::class;
    protected $searchableFields = [];

}