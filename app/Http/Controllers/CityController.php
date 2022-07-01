<?php

namespace App\Http\Controllers;

use App\Services\CityService;

class CityController extends Controller
{
    protected $cityService;

    public function __construct(CityService $cityService)
    {
        $this->cityService = $cityService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCity()
    {
        if (empty(request('name'))) {
            return response()->json(
                [
                    'error' => 'The field name cannot be empty or null',
                ],
                422
            );
        }

        if (is_null(request('city_group_id'))) {
            return response()->json(
                [
                    'error' => 'The field city_group_id cannot be null',
                ],
                422
            );
        }

        $city = $this->cityService->store();

        return $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCities()
    {
        $city = $this->cityService->listAll();

        return $city;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCity($id)
    {
        $city = $this->cityService->show($id);

        return $city;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCity($id)
    {
        if (empty(request('name'))) {
            return response()->json(
                [
                    'error' => 'The field name cannot be empty or null',
                ],
                422
            );
        }

        if (is_null(request('city_group_id'))) {
            return response()->json(
                [
                    'error' => 'The field city_group_id cannot be null',
                ],
                422
            );
        }

        $city = $this->cityService->update($id);

        return $city;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCity($id)
    {
        $city = $this->cityService->destroy($id);

        return $city;
    }
}
