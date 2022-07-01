<?php

namespace App\Services;

use App\Models\Campaign;
use App\Models\Product;

class ProductService {

    public function listAll()
    {
        return Product::paginate();
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(
                [
                    'error' => 'Product not found',
                ],
                422
            );
        }

        return $product;
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

        return Product::create($this->fields());
    }

    public function update($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(
                [
                    'error' => 'Product not found',
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

        $product->fill($this->fields());
        $product->save();

        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(
                [
                    'error' => 'Product not found',
                ],
                422
            );
        }

        return $product->delete();
    }

    private function fields()
    {
        $fields = [
            'name'  => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'status' => request('status'),
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

        if (is_null(request('description'))) {
            return 'The field description cannot be null';
        }

        if (!is_string(request('description'))) {
            return 'The field description need to be string';
        }

        if (is_null(request('price'))) {
            return 'The field price cannot be null';
        }

        if (!is_float(request('price'))) {
            return 'The field price need to be float';
        }

        if (is_null(request('status'))) {
            return 'The field status cannot be null';
        }

        if (!is_integer(request('status'))) {
            return 'The field status need to be integer';
        }

        if (is_null(request('campaign_id'))) {
            return 'The field campaign_id cannot be null';
        }

        if (!is_integer(request('campaign_id'))) {
            return 'The field campaign_id need to be integer';
        }

        $hasCityName = Product::where('name', request('name'));

        if ($id) {
            $hasCityName->where('id', '!=', $id);
        }

        $hasCityName = $hasCityName->first();

        if ($hasCityName) {
            return 'The name ' . request('name') . ' is already used';
        }

        $existCampaign = Campaign::find(request('campaign_id'));

        if (!$existCampaign) {
            return 'Campaign not found with the campaign_id ' . request('campaign_id');
        }
    }
}
