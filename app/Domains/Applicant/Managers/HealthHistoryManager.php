<?php


namespace App\Domains\Applicant\Managers;


use App\Domains\Applicant\Repository\HealthHistoryRepository;
use App\Extendable\ManipulationManager;

class HealthHistoryManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(HealthHistoryRepository $repository)
    {
        parent::__construct($repository);
    }

}