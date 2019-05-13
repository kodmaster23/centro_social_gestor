<?php


namespace App\Extendable;


use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class Repository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model = null;
    protected $searchableFields = [];
    /**
     * @var JsonResource
     */
    protected $presenter = null;
    protected $returnable = null;
    /**
     * @var Builder
     */

    protected $query = null;
    protected $saved = null;
    /**
     * @var array
     */
    protected $filters;


    public function find(int $id, array $with = [])
    {
        $query = $this->newQuery();
        $query->with($with);
        $this->returnable = $query->findOrFail($id);
        return $this->present();
    }

    public function list(array $filters = [], array $with = [], $pagination = 45)
    {
        $query = $this->newQuery();
        $query->with($with);
        if(!empty($filters)){
            $this->applyFilters($filters);
            $this->injectFiltersOnQuery();
        }
        $this->returnable = $query->paginate($pagination);
        return $this->present();
    }

    public function applyFilters(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function injectFiltersOnQuery()
    {
        foreach ($this->searchableFields as $searchableField){
            if(in_array($searchableField['field'], $this->filters)){
                $this->query->where(
                    $searchableField['field'],
                    $searchableField['operator'] ?? "=",
                    $this->filters[$searchableField['field']]
                );
            }
        }
    }

    public function setPresenter(JsonResource $resource)
    {
       $this->presenter = $resource;
    }

    public function newQuery()
    {
        return $this->query = $this->model->query();
    }

    public function present()
    {
        if(!$this->returnable){
            throw new ModelNotFoundException();
        }
        if(!$this->presenter){
            return $this->returnable;
        }

        if($this->returnable instanceof Collection) {
            return $this->presenter::collection($this->returnable);
        }

        $model_class = get_class($this->model);
        if($this->returnable instanceof $model_class) {
            return new $this->presenter($this->returnable);
        }
        return $this->returnable;
    }

    public function storeOrUpdate($values, int $id = null, array $relations = [])
    {
        $presenter = $this->presenter;
        $this->setPresenter(null);

        if($id){
            $model = $this->find($id);
        }else{
            $model = new $this->model;
        }
        $model->fill($values);
        $this->returnable = $model->save();
        if(!empty($relations)){
            $this->associate($relations);
        }
        if($presenter){
            $this->setPresenter($presenter);
        }

        return $this->present();
    }

    public function associate(array $relations)
    {
        foreach ($relations as $relation){
            $this->returnable->$relation['name']()->associate($relation['model']);
        }
        $this->returnable->save();
    }

    public function destroy(int $id)
    {
        $model = $this->find($id);
        return $model->destroy();
    }
}