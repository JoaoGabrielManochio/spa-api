<?php

namespace App\Services;

use App\Models\Discount;
use App\Models\Product;

class DiscountService {

    public function listAll()
    {
        return Discount::paginate();
    }

    public function show($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(
                [
                    'error' => 'Discount not found',
                ],
                422
            );
        }

        return $discount;
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

        return Discount::create($this->fields());
    }

    public function update($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(
                [
                    'error' => 'Discount not found',
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

        $discount->fill($this->fields());
        $discount->save();

        return $discount;
    }

    public function destroy($id)
    {
        $discount = Discount::find($id);

        if (!$discount) {
            return response()->json(
                [
                    'error' => 'Discount not found',
                ],
                422
            );
        }

        return $discount->delete();
    }

    private function fields()
    {
        $fields = [
            'product_id'  => request('product_id'),
            'discount' => request('discount'),
        ];

        return $fields;
    }

    private function validate($id = 0)
    {
        if (empty(request('discount'))) {
            return 'The field discount cannot be empty or null';
        }

        if (!is_float(request('discount'))) {
            return 'The field discount need to be float';
        }

        if (is_null(request('product_id'))) {
            return 'The field product_id cannot be null';
        }

        if (!is_integer(request('product_id'))) {
            return 'The field product_id need to be integer';
        }

        $hasProductDiscount = Discount::where('product_id', request('product_id'));

        if ($id) {
            $hasProductDiscount->where('id', '!=', $id);
        }

        $hasProductDiscount = $hasProductDiscount->first();

        if ($hasProductDiscount) {
            return 'The product_id ' . request('product_id') . ' is already used';
        }

        $existProduct = Product::find(request('product_id'));

        if (!$existProduct) {
            return 'Product not found with the product_id ' . request('product_id');
        }
    }
}
