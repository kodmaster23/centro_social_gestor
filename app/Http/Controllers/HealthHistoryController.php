<?php

namespace App\Http\Controllers;

use App\Domains\Applicant\Managers\HealthHistoryManager;
use App\Domains\Applicant\Repository\HealthHistoryRepository;


class HealthHistoryController extends CrudController
{
    public function __construct(
        HealthHistoryManager $manager,
        HealthHistoryRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
