<?php

namespace App\Http\Controllers;

use App\Domains\Applicant\Managers\ScholarityManager;
use App\Domains\Applicant\Repository\ScholarityRepository;


class ScholarityController extends CrudController
{
    public function __construct(
        ScholarityManager $manager,
        ScholarityRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
