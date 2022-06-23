<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::search('name')->latest()->paginate(6);

        return Inertia::render('Product/Index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Product/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($request->file('image')){
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());
            Product::create([
                'name' => $request->name,
                'image' => $image->hashName(),
                'description' => $request->description,
                'stock' => $request->stock,
            ]);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'stock' => $request->stock,
        ]);



        return redirect(route('product.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return Inertia::render('Product/Edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if($request->file('image')){
            Storage::disk('local')->delete('public/products/'. basename($product->image));

            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            $product->update([
                'image' => $image->hashName(),
            ]);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::disk('local')->delete('public/products/'. basename($product->image));

        $product->delete();

        return back();
    }
}
