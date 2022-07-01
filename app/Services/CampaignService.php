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

        $validate = $this->validate();

        if ($validate) {
            return response()->json(
                [
                    'error' => $validate,
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

        $validate = $this->validate($id);

        if ($validate) {
            return response()->json(
                [
                    'error' => $validate,
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

    private function validate($id = 0)
    {
        if (empty(request('name'))) {
            return 'The field name cannot be empty or null';
        }

        if (!is_string(request('name'))) {
            return 'The field name need to be string';
        }

        if (is_null(request('active'))) {
            return 'The field active cannot be null';
        }

        if (!is_integer(request('active'))) {
            return 'The field active need to be integer';
        }

        $hasCampaign = Campaign::where('name', request('name'));

        if ($id) {
            $hasCampaign->where('id', '!=', $id);
        }

        $hasCampaign = $hasCampaign->first();

        if ($hasCampaign) {
            return 'The name ' . request('name') . ' is already used';
        }
    }
}
