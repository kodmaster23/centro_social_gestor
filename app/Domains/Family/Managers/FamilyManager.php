<?php


namespace App\Domains\Family\Managers;


use App\Domains\Family\FamilyRepository;
use App\Extendable\ManipulationManager;

class FamilyManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(FamilyRepository $repository)
    {
        parent::__construct($repository);
    }

}