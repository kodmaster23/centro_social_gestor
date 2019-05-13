<?php


namespace App\Interfaces;


use Illuminate\Http\Resources\Json\JsonResource;

interface RepositoryInterface
{

    public function find(int $id, array $with = []);
    public function list(array  $filters = [], array  $with = [],$pagination = 45);
    public function applyFilters(array $filters = []);
    public function injectFiltersOnQuery();
    public function setPresenter(JsonResource $resource);
    public function present();
    public function newQuery();
    public function storeOrUpdate($values, int $id = null,  array $relations = []);
    public function destroy(int $id);
    public function associate(array $relations);

}