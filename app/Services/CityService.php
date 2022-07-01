<?php

namespace App\Services;

use App\Models\City;
use App\Models\CityGroup;

class CityService {

    public function listAll()
    {
        return City::paginate();
    }

    public function show($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json(
                [
                    'error' => 'City not found',
                ],
                422
            );
        }

        return $city;
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

        return City::create($this->fields());
    }

    public function update($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json(
                [
                    'error' => 'City not found',
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

        $city->fill($this->fields());
        $city->save();

        return $city;
    }

    public function destroy($id)
    {
        $city = City::find($id);

        if (!$city) {
            return response()->json(
                [
                    'error' => 'City not found',
                ],
                422
            );
        }

        return $city->delete();
    }

    private function fields()
    {
        $fields = [
            'name'  => request('name'),
            'city_group_id' => request('city_group_id'),
        ];

        return $fields;
    }

    private function validate($id = 0)
    {
        $hasCityName = City::where('name', request('name'));

        if ($id) {
            $hasCityName->where('id', '!=', $id);
        }

        $hasCityName = $hasCityName->first();

        if ($hasCityName) {
            return 'The name ' . request('name') . ' is already used';
        }

        $existCityGroup = CityGroup::find(request('city_group_id'));

        if (!$existCityGroup) {
            return 'City group not found with the city_group_id ' . request('city_group_id');
        }
    }
}


