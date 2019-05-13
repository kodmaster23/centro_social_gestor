<?php

namespace App\Http\Controllers;

use App\Domains\Family\FamilyRepository;
use App\Domains\Family\Managers\FamilyManager;


class FamilyController extends CrudController
{
    public function __construct(
        FamilyManager $manager,
        FamilyRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

    public function show($id)
    {
        return parent::show($id);
    }


}
