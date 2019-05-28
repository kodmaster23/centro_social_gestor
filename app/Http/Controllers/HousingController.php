<?php

namespace App\Http\Controllers;

use App\Domains\Family\Repository\HousingRepository;
use App\Domains\Family\Managers\HousingManager;


class HousingController extends CrudController
{
    public function __construct(
        HousingManager $manager,
        HousingRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
