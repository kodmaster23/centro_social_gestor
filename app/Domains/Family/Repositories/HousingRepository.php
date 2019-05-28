<?php


namespace App\Domains\Family\Repository;


use App\Extendable\Repository;
use App\Models\Housing;

class HousingRepository extends Repository
{
    protected $model = Housing::class;
    protected $searchableFields = [];

}