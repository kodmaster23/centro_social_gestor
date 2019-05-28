<?php


namespace App\Domains\Common\Traits;


trait HasRelations
{
    public function getRelations($values)
    {
        $relations = [];
        foreach ($values as $key => $value){
            if(in_array($key, $this->relations)){
                $repository = $key.'_repository';
                $$key = $this->$repository->find($value);

                  $row = ['name' =>$key, 'model' => $$key];
                  if(isset($this->polymorphic) && !empty($this->polymorphic)){
                      $row = array_merge($row, ["polymorphic" => $this->polymorphic]);
                  }
                $relations[] = $row;
            }
        }

        return $relations;
    }

    public function storeOrUpdate($values, int $id = null)
    {
        $this->validate($values, $id);
        $relations = $this->getRelations($values);
        return $this->persist($values, $id, $relations);

    }
}