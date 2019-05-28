<?php


namespace App\Domains\Family\Managers;


use App\Domains\Family\Repository\RelationshipTypeRepository;
use App\Extendable\ManipulationManager;

class RelationshipTypeManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(RelationshipTypeRepository $repository)
    {
        parent::__construct($repository);
    }

}