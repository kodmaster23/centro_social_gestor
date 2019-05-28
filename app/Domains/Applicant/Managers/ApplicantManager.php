<?php


namespace App\Domains\Applicant\Managers;


use App\Domains\Applicant\Repository\ApplicantRepository;
use App\Extendable\ManipulationManager;

class ApplicantManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(ApplicantRepository $repository)
    {
        parent::__construct($repository);
    }

}