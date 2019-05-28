<?php


namespace App\Domains\Family\Repository;


use App\Extendable\Repository;
use App\Models\FamilyMember;

class FamilyMemberRepository extends Repository
{
    protected $model = FamilyMember::class;
    protected $searchableFields = [];

}