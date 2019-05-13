<?php


namespace App\Extendable;


use App\Interfaces\ManipulationManagerInterface;
use App\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ManipulationManager implements ManipulationManagerInterface
{
    const CREATE = 'create';
    const EDIT = 'edit';
    protected $validation = [
        self::CREATE => [],
        self::EDIT => []
    ];
    /**
     * @var RepositoryInterface
     */
    protected $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }


    public function storeOrUpdate($values, int $id = null)
    {

        $validator = Validator::make(
            $values,
            $id ? $this->validation[self::EDIT] : $this->validation[self::CREATE]
        );
        if($validator->fails()){
            throw new ValidationException($validator);
        }
        return  $this->repository->storeOrUpdate($values, $id);
    }

    public function destroy(int $id)
    {
        return  $this->repository->destroy($id);
    }


}