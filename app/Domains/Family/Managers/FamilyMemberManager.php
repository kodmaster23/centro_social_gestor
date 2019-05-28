<?php


namespace App\Domains\Family\Managers;


use App\Domains\Common\Traits\HasRelations;
use App\Domains\Family\Repository\FamilyMemberRepository;
use App\Domains\Family\Repository\FamilyRepository;
use App\Extendable\ManipulationManager;

class FamilyMemberManager extends ManipulationManager
{

    use HasRelations;

    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];

    private $relations = ['family'];
    /**
     * @var FamilyRepository
     */
    private $family_repository;

    /**
     * FamilyMemberManager constructor.
     * @param FamilyMemberRepository $repository
     * @param FamilyRepository $family_repository
     */
    public function __construct(
        FamilyMemberRepository $repository,
        FamilyRepository $family_repository
    )
    {
        parent::__construct($repository);
        $this->family_repository = $family_repository;
    }


}