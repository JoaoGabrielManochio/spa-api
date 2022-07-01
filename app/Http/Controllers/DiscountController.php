<?php

namespace App\Http\Controllers;

use App\Services\DiscountService;

class DiscountController extends Controller
{
    protected $discountService;

    public function __construct(DiscountService $discountService)
    {
        $this->discountService = $discountService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeDiscount()
    {
        $discount = $this->discountService->store();

        return $discount;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDiscounts()
    {
        $discount = $this->discountService->listAll();

        return $discount;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDiscount($id)
    {
        $discount = $this->discountService->show($id);

        return $discount;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateDiscount($id)
    {
        $discount = $this->discountService->update($id);

        return $discount;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteDiscount($id)
    {
        $discount = $this->discountService->destroy($id);

        return $discount;
    }
}
