<?php


namespace App\Domains\Family\Repository;


use App\Extendable\Repository;
use App\Models\RelationshipType;

class RelationshipTypeRepository extends Repository
{
    protected $model = RelationshipType::class;
    protected $searchableFields = [];

}