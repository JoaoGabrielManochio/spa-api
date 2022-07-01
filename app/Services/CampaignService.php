<?php

namespace App\Services;

use App\Models\Campaign;

class CampaignService {

    public function listAll()
    {
        return Campaign::paginate();
    }

    public function show($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json(
                [
                    'error' => 'Campaign not found',
                ],
                422
            );
        }

        return $campaign;
    }

    public function store()
    {

        $hasCampaign = Campaign::where('name', request('name'))
            ->first();

        if ($hasCampaign) {
            return response()->json(
                [
                    'error' => 'The name ' . request('name') . ' is already used',
                ],
                422
            );
        }

        return Campaign::create($this->fields());
    }

    public function update($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json(
                [
                    'error' => 'Campaign not found',
                ],
                422
            );
        }

        $campaign->fill($this->fields());
        $campaign->save();

        return $campaign;
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);

        if (!$campaign) {
            return response()->json(
                [
                    'error' => 'Campaign not found',
                ],
                422
            );
        }

        return $campaign->delete();
    }

    private function fields()
    {
        $fields = [
            'name'  => request('name'),
            'active' => request('active')
        ];

        return $fields;
    }
}
