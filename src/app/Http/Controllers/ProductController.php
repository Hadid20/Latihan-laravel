<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::all();
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ProductImage' => 'required',
            'ProductTitle' => 'required',
            'ProductDescription' => 'required',
            'ProductPrice' => 'required'
        ]);

        $data = Product::create($request->all());

        if ($request->hasFile('ProductImage')) {
            $filename = uniqid() . "-" . $request->file('ProductImage')->getClientOriginalName();
            $request->file('ProductImage')->storeAs('/Image/' . $filename);
            $data->ProductImage = $filename;
            $data->save();
        }
        ;
        return redirect()->route('Product')->with('message', 'succes');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //

        return view('product.detail', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //

        return view('product.edit', ['product' => $product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'ProductImage' => 'required',
            'ProductTitle' => 'required',
            'ProductDescription' => 'required',
            'ProductPrice' => 'required'
        ]);

        $product->update($request->all());

        if ($request->hasFile('ProductImage')) {
            $filename = uniqid() . "-" . $request->file('ProductImage')->getClientOriginalName();
            $request->file('ProductImage')->storeAs('/Image/' . $filename);
            $product->ProductImage = $filename;
            $product->save();
        }
        ;
        return redirect()->route('Product')->with('message', 'succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('Product')->with('message', 'succes');

    }
}
