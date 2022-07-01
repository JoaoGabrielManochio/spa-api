<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\CityGroup;

class CityGroupService {

    public function listAll()
    {
        return CityGroup::paginate();
    }

    public function show($id)
    {
        $cityGroup = CityGroup::find($id);

        if (!$cityGroup) {
            return response()->json(
                [
                    'error' => 'City group not found',
                ],
                422
            );
        }

        return $cityGroup;
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

        return CityGroup::create($this->fields());
    }

    public function update($id)
    {
        $cityGroup = CityGroup::find($id);

        if (!$cityGroup) {
            return response()->json(
                [
                    'error' => 'City group not found',
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

        $cityGroup->fill($this->fields());
        $cityGroup->save();

        return $cityGroup;
    }

    public function destroy($id)
    {
        $cityGroup = CityGroup::find($id);

        if (!$cityGroup) {
            return response()->json(
                [
                    'error' => 'City group not found',
                ],
                422
            );
        }

        return $cityGroup->delete();
    }

    private function fields()
    {
        $fields = [
            'name'  => request('name'),
            'campaign_id' => request('campaign_id'),
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

        if (is_null(request('campaign_id'))) {
            return 'The field campaign_id cannot be null';
        }

        if (!is_integer(request('campaign_id'))) {
            return 'The field campaign_id need to be integer';
        }

        $hasCityGroupName = CityGroup::where('name', request('name'));

        if ($id) {
            $hasCityGroupName->where('id', '!=', $id);
        }

        $hasCityGroupName = $hasCityGroupName->first();

        if ($hasCityGroupName) {
            return 'The name ' . request('name') . ' is already used';
        }

        $existCampaign = Campaign::find(request('campaign_id'));

        if (!$existCampaign) {
            return 'Campaign not found with the campaign_id ' . request('campaign_id');
        }
    }
}
