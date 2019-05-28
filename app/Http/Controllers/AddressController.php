<?php

namespace App\Http\Controllers;

use App\Domains\Institution\Managers\AddressManager;
use App\Domains\Institution\Repository\AddressRepository;


class AddressController extends CrudController
{
    public function __construct(
        AddressManager $manager,
        AddressRepository $repository
    )
    {
        parent::__construct($manager, $repository);
    }

}
