<?php

namespace App\Http\Controllers;

use App\Domains\Applicant\Managers\ApplicantManager;
use App\Domains\Applicant\Repository\ApplicantRepository;


class ApplicantController extends CrudController
{
    public function __construct(
        ApplicantManager $manager,
        ApplicantRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
