<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Budget;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('product.index')
            ->with('products', $products);
    }


    public function create()
    {
        return view('product.create');
    }


    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return redirect(route('product.index'));

    }


    public function show(Product $product)
    {
        return view('product.show')
            ->with('product', $product);
    }


    public function edit(Product $product)
    {
        return view('product.edit')
            ->with('product', $product);
    }


    public function update(ProductRequest $request, Product $product)
    {
        $product->fill($request->all());
        $product->save();
        return redirect(route('product.index'));
    }


    public function destroy(Product $product)
    {
        if (Budget::where('product', $product->id)->exists()) {
            return redirect(route('product.index'));
        }

        $product->delete();
        return redirect(route('product.index'));
    }
}
