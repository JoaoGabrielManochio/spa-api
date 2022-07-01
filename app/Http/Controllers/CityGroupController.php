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
        if (empty(request('name'))) {
            return response()->json(
                [
                    'error' => 'The field name cannot be empty or null',
                ],
                422
            );
        }

        if (is_null(request('campaign_id'))) {
            return response()->json(
                [
                    'error' => 'The field campaign_id cannot be null',
                ],
                422
            );
        }

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
        if (empty(request('name'))) {
            return response()->json(
                [
                    'error' => 'The field name cannot be empty or null',
                ],
                422
            );
        }

        if (is_null(request('campaign_id'))) {
            return response()->json(
                [
                    'error' => 'The field campaign_id cannot be null',
                ],
                422
            );
        }

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
