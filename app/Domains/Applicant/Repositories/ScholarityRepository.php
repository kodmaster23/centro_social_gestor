<?php


namespace App\Domains\Applicant\Repository;


use App\Extendable\Repository;
use App\Models\Scholarity;

class ScholarityRepository extends Repository
{
    protected $model = Scholarity::class;
    protected $searchableFields = [];

}