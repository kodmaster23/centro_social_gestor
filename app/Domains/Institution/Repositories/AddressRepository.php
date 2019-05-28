<?php


namespace App\Domains\Institution\Repository;


use App\Extendable\Repository;
use App\Models\Address;

class AddressRepository extends Repository
{
    protected $model = Address::class;
    protected $searchableFields = [];

    public function __construct()
    {
        $this->setPolymorphic(true);
    }


}