<?php


namespace App\Domains\Applicant\Managers;


use App\Domains\Applicant\Repository\ScholarityRepository;
use App\Extendable\ManipulationManager;

class ScholarityManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(ScholarityRepository $repository)
    {
        parent::__construct($repository);
    }

}