<?php


namespace App\Domains\Family\Managers;


use App\Domains\Family\Repository\HousingRepository;
use App\Extendable\ManipulationManager;

class HousingManager extends ManipulationManager
{
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    public function __construct(HousingRepository $repository)
    {
        parent::__construct($repository);
    }

}