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
