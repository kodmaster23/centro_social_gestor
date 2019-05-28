<?php

namespace App\Http\Controllers;

use App\Domains\Family\Repository\RelationshipTypeRepository;
use App\Domains\Family\Managers\RelationshipTypeManager;


class RelationshipTypeController extends CrudController
{
    public function __construct(
        RelationshipTypeManager $manager,
        RelationshipTypeRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
