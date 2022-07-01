<?php

namespace App\Http\Controllers;

use App\Services\CityGroupService;

class CityGroupController extends Controller
{
    protected $cityGroupService;

    public function __construct(CityGroupService $cityGroupService)
    {
        $this->cityGroupService = $cityGroupService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCityGroup()
    {
        $campaign = $this->cityGroupService->store();

        return $campaign;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCityGroups()
    {
        $campaign = $this->cityGroupService->listAll();

        return $campaign;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCityGroup($id)
    {
        $campaign = $this->cityGroupService->show($id);

        return $campaign;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCityGroup($id)
    {
        $campaign = $this->cityGroupService->update($id);

        return $campaign;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCityGroup($id)
    {
        $campaign = $this->cityGroupService->destroy($id);

        return $campaign;
    }
}
