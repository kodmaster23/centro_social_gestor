<?php

namespace App\Http\Controllers;

use App\Domains\Institution\Managers\ExternalInstitutionManager;
use App\Domains\Institution\Repository\ExternalInstitutionRepository;


class ExternalInstitutionController extends CrudController
{
    public function __construct(
        ExternalInstitutionManager $manager,
        ExternalInstitutionRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
