<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
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
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('product.create', compact('categories'));
    }

    /**p
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'required|file|between:0,2048|mimes:jpeg,jpg,png',
            'stock' => 'required|max:3',
            'product_category_id' => 'required',
        ]);

        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path() . '/upload';
        $file->move($destinationPath, $fileName);
        $data['image'] = $file->getClientOriginalName();

        $data['slug'] = strtolower(str_replace(' ', '-', $data['name']));

        Product::create($data);

        return redirect('/dashboard/products')->with('success', 'Produk Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'image' => 'file|between:0,2048|mimes:jpeg,jpg,png',
            'stock' => 'required|max:3',
            'product_category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/upload';
            $file->move($destinationPath, $fileName);
            $data['image'] = $file->getClientOriginalName();
        }

        $data['slug'] = strtolower(str_replace(' ', '-', $data['name']));

        $product->update($data);
        return redirect('/dashboard/products')->with('success', 'Produk Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/dashboard/products')->with('success', 'Produk Dihapus');
    }
}
