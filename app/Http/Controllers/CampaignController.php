<?php

namespace App\Http\Controllers;

use App\Services\CampaignService;

class CampaignController extends Controller
{
    protected $campaignService;

    public function __construct(CampaignService $campaignService)
    {
        $this->campaignService = $campaignService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeCampaign()
    {
        if (empty(request('name'))) {
            return response()->json(
                [
                    'error' => 'The field name cannot be empty or null',
                ],
                422
            );
        }

        if (is_null(request('active'))) {
            return response()->json(
                [
                    'error' => 'The field active cannot be null',
                ],
                422
            );
        }

        $campaign = $this->campaignService->store();

        return $campaign;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCampaigns()
    {
        $campaign = $this->campaignService->listAll();

        return $campaign;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCampaign($id)
    {
        $campaign = $this->campaignService->show($id);

        return $campaign;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCampaign($id)
    {
        if (empty(request('name'))) {
            return response()->json(
                [
                    'error' => 'The field name cannot be empty or null',
                ],
                422
            );
        }

        if (is_null(request('active'))) {
            return response()->json(
                [
                    'error' => 'The field active cannot be null',
                ],
                422
            );
        }

        $campaign = $this->campaignService->update($id);

        return $campaign;
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteCampaign($id)
    {
        $campaign = $this->campaignService->destroy($id);

        return $campaign;
    }
}
