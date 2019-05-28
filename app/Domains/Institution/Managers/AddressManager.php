<?php


namespace App\Domains\Institution\Managers;


use App\Domains\Common\Traits\HasRelations;
use App\Domains\Family\Repository\FamilyMemberRepository;
use App\Domains\Institution\Repository\AddressRepository;
use App\Extendable\ManipulationManager;

class AddressManager extends ManipulationManager
{

    use HasRelations;

    protected $relations = ["family_member"];
    protected $polymorphic = "address";
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];
    /**
     * @var FamilyMemberRepository
     */
    private $family_member_repository;

    /**
     * AddressManager constructor.
     * @param AddressRepository $repository
     * @param FamilyMemberRepository $family_member_repository
     */
    public function __construct(
        AddressRepository $repository,
        FamilyMemberRepository $family_member_repository
    )
    {
        parent::__construct($repository);
        $this->family_member_repository = $family_member_repository;
    }

}