<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $allProduct = Product::all();
        $productVariant = ProductVariant::all();
        $variantPrice = ProductVariantPrice::all();
        return view('products.index',compact('allProduct','productVariant','variantPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $productInfo = new Product;
        $productInfo->title = $request->title;
        $productInfo->sku = $request->sku;
        $productInfo->description = $request->description;
        $productInfo->save();
        //image
        $picture = new ProductImage;
        $picture->product_id = $productInfo->id;
        $pictureName = $productInfo->id.$request->file('picture')->extension();
        $file = $request->file('picture');
        $path = '/productPicture/'.$pictureName;
        $file->move(public_path($path));
        $picture->file_path = $path;
        $picture->save();
        //varient
        $varientPrice = new ProductVariantPrice;
        if ($request->v1_title){
            $varient = new Variant;
            $varient->title = $request->v1_title;
            $varient->description = $request->v1_description;
            $varient->save();
            $pVarient = new ProductVariant;
            $pVarient->variant = $request->v1_title;
            $pVarient->variant_id = $varient->id;
            $pVarient->product_id = $productInfo->id;
            $pVarient->save();
            $varientPrice->product_variant_one = $request->v1_title;
        }
        if ($request->v2_title){
            $varient = new Variant;
            $varient->title = $request->v2_title;
            $varient->description = $request->v2_description;
            $varient->save();
            $pVarient = new ProductVariant;
            $pVarient->variant = $request->v2_title;
            $pVarient->variant_id = $varient->id;
            $pVarient->product_id = $productInfo->id;
            $pVarient->save();
            $varientPrice->product_variant_two = $request->v2_title;
        }
        if ($request->v3_title){
            $varient = new Variant;
            $varient->title = $request->v3_title;
            $varient->description = $request->v3_description;
            $varient->save();
            $pVarient = new ProductVariant;
            $pVarient->variant = $request->v3_title;
            $pVarient->variant_id = $varient->id;
            $pVarient->product_id = $productInfo->id;
            $pVarient->save();
            $varientPrice->product_variant_three = $request->v3_title;
        }
        $varientPrice->price = $request->price;
        $varientPrice->stock = $request->stock;
        $varientPrice->product_id = $productInfo->id;
        $varientPrice->save();
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $variants = Variant::all();
        return view('products.edit', compact('variants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
