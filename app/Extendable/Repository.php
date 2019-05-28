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
    private $polymorphic = false;

    /**
     * @param array $filters
     * @param array $with
     * @param int $pagination
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|null
     */
    public function list(array $filters = [], array $with = [], $pagination = 45)
    {
        $query = $this->newQuery();
        $query->with($with);
        if (!empty($filters)) {
            $this->applyFilters($filters);
            $this->injectFiltersOnQuery();
        }
        $this->returnable = $query->paginate($pagination);
        return $this->present();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function newQuery()
    {
        return $this->query = $this->model::query();
    }

    /**
     * @param array $filters
     */
    public function applyFilters(array $filters = [])
    {
        $this->filters = $filters;
    }

    /**
     *
     */
    public function injectFiltersOnQuery()
    {
        foreach ($this->searchableFields as $searchableField) {
            if (in_array($searchableField['field'], array_keys($this->filters))) {
                $this->query->where(
                    $searchableField['field'],
                    $searchableField['operator'] ?? "=",
                    $this->filters[$searchableField['field']]
                );
            }
        }
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|null
     */
    public function present()
    {
        if (!$this->returnable) {
            throw new ModelNotFoundException();
        }

        if (!$this->presenter) {
            return $this->returnable;
        }

        if ($this->returnable instanceof Collection) {
            return $this->presenter::collection($this->returnable);
        }

        $model_class = get_class($this->model);
        if ($this->returnable instanceof $model_class) {
            return new $this->presenter($this->returnable);
        }
        return $this->returnable;
    }

    /**
     * @param $values
     * @param int|null $id
     * @param array $relations
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|null
     */
    public function storeOrUpdate($values, int $id = null, array $relations = [])
    {
        $presenter = $this->presenter;
        $this->setPresenter(null);

        if ($id) {
            $this->returnable = $this->find($id);
        } else {
            $this->returnable = new $this->model;
        }
        $this->returnable->fill($values);

        $this->persist($relations);

        if ($presenter) {
            $this->setPresenter($presenter);
        }

        return $this->present();
    }

    /**
     * @param JsonResource $resource
     */
    public function setPresenter($resource = null)
    {
        $this->presenter = $resource;
    }

    /**
     * @param int $id
     * @param array $with
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|null
     */
    public function find(int $id, array $with = [])
    {
        $query = $this->newQuery();
        $query->with($with);
        $this->returnable = $query->findOrFail($id);
        return $this->present();
    }

    /**
     * @param int $id
     * @return int
     */
    public function destroy(int $id)
    {
        return $this->model::destroy($id);
    }

    public function persist(array $relations = [])
    {
        if ($this->isPolymorphic()) {
            return $this->persistPolymorphic($relations);
        }
        if (!empty($relations)) {
            $this->associate($relations);
        }
        $this->returnable->save();
    }

    /**
     * @return bool
     */
    public function isPolymorphic(): bool
    {
        return $this->polymorphic;
    }

    /**
     * @param bool $polymorphic
     */
    public function setPolymorphic(bool $polymorphic): void
    {
        $this->polymorphic = $polymorphic;
    }

    public function persistPolymorphic(array $relations)
    {
        $result = false;
        foreach ($relations as $relation) {
            $model = $relation['model'];
            $polymorphic = $relation['polymorphic'];
            $result = $model->$polymorphic()->save($this->returnable);
        }
        return $result;
    }

    /**
     * @param array $relations
     */
    public function associate(array $relations)
    {
        foreach ($relations as $relation) {
            $relationship = $relation['name'];
            $this->returnable->$relationship()->associate($relation['model']);
        }
    }
}