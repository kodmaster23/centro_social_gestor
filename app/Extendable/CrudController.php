<?php

namespace App\Http\Controllers;

use App\Interfaces\ManipulationManagerInterface;
use App\Interfaces\RepositoryInterface;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CrudController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @var ManipulationManagerInterface
     */
    private $manager;
    /**
     * @var RepositoryInterface
     */
    private $repository;

    /**
     * CrudController constructor.
     * @param ManipulationManagerInterface $manager
     * @param RepositoryInterface $repository
     */
    public function __construct(
        ManipulationManagerInterface $manager,
        RepositoryInterface $repository
    )
    {

        $this->manager = $manager;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sanitized = $request->all();
        return $this->repository->list($sanitized);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanitized = $request->all();
        return $this->manager->storeOrUpdate($sanitized);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sanitized = $request->all();
        return $this->manager->storeOrUpdate($sanitized, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->manager->destroy($id);
    }

}
