<?php


namespace App\Domains\Institution\Managers;


use App\Domains\Institution\Repository\ExternalInstitutionRepository;
use App\Extendable\ManipulationManager;

class ExternalInstitutionManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(ExternalInstitutionRepository $repository)
    {
        parent::__construct($repository);
    }

}