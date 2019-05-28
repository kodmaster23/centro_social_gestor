<?php


namespace App\Domains\Applicant\Repository;


use App\Extendable\Repository;
use App\Models\HealthHistory;

class HealthHistoryRepository extends Repository
{
    protected $model = HealthHistory::class;
    protected $searchableFields = [];

}