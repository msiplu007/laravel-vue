<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return response()->json([
           'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mutipleDelete(Request $request)
    {
       foreach($request->all() as $product){
           Product::find($product['id'])->delete();
       }
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->productValidation($request);
        $product = new Product();
        $request['image'] = 'test';
        $product->create($request->all());
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $this->index();
    }
 public function productValidation($request)
 {
    $request->validate([
       'name'=>'required',
        'price'=>'required',

       ' description'=>'required',
        //'image'=>'required',

        'quantity'=>'required',

        'category_id'=>'required',
        'brand_id'=>'required',
    ],
    [
        'category_id.required' => 'Category ID is required good',
        'brand_id.required' => 'Brand ID is required',
    ]

);
 }

}
