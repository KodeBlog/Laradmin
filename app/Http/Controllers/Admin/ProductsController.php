<?php

namespace Larashop\Http\Controllers\Admin;

use Larashop\Models\Brand;
use Larashop\Models\Product;
use Illuminate\Http\Request;
use Larashop\Models\Category;
use Larashop\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        $params = [
            'title' => 'Products Listing',
            'products' => $products,
        ];

        return view('admin.products.products_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();

        $params = [
            'title' => 'Create Product',
            'brands' => $brands,
            'categories' => $categories,
        ];

        return view('admin.products.products_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            'product_code' => $request->input('product_code'),
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'brand_id' => $request->input('brand_id'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('products.index')->with('success', "The product <strong>Product name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        $params = [
            'title' => 'Delete Product',
            'product' => $product,
        ];

        return view('admin.products.products_delete')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::find($id);

        $params = [
            'title' => 'Edit Product',
            'brands' => $brands,
            'categories' => $categories,
            'product' => $product,
        ];

        return view('admin.products.products_edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product){
            return redirect()
                ->route('products.index')
                ->with('warning', 'The product you requested for has not been found.');
        }

        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->brand_id = $request->input('brand_id');
        $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('products.index')->with('success', "The product <strong>$product->name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product){
            return redirect()
                ->route('product.index')
                ->with('warning', 'The product you requested for has not been found.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', "The product <strong>$product->product_name</strong> has successfully been archived.");
    }
}