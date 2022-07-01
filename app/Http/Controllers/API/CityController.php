<?php

namespace App\Http\Controllers;

use App\Services\CityService;
use Illuminate\Http\Request;

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
    public function getCities()
    {
        $cities = $this->cityService->list();

        return $cities;
    }
}
