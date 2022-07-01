<?php

namespace App\Http\Controllers;

use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeProduct()
    {
        $product = $this->productService->store();

        return $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        $product = $this->productService->listAll();

        return $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        $product = $this->productService->show($id);

        return $product;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProduct($id)
    {
        $product = $this->productService->update($id);

        return $product;
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $product = $this->productService->destroy($id);

        return $product;
    }
}
