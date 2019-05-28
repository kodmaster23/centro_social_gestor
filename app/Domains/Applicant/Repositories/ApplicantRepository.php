<?php


namespace App\Domains\Applicant\Repository;


use App\Extendable\Repository;
use App\Models\Applicant;

class ApplicantRepository extends Repository
{
    protected $model = Applicant::class;
    protected $searchableFields = [];

}