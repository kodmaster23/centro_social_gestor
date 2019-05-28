<?php

namespace App\Http\Controllers;

use App\Domains\Family\Repository\FamilyMemberRepository;
use App\Domains\Family\Managers\FamilyMemberManager;


class FamilyMemberController extends CrudController
{
    public function __construct(
        FamilyMemberManager $manager,
        FamilyMemberRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

    public function show($id)
    {
        return $this->repository->find($id, ['address', 'family']);
    }
}
