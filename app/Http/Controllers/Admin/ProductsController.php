<?php

namespace Larashop\Http\Controllers\Admin;

use Larashop\Models\Brand;
use Larashop\Models\Product;
use Illuminate\Http\Request;
use Larashop\Models\Category;
use Larashop\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductsController extends Controller
{
              /**
     * Instantiate a new BrandsController instance.
     */
    public function __construct()
    {
        $this->middleware('permission:create', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete', ['only' => ['show', 'delete']]);
    }
    
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
        $this->validate($request, [
            'product_code' => 'required|unique:products',
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
        ]);

        $product = Product::create([
            'product_code' => $request->input('product_code'),
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'brand_id' => $request->input('brand_id'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('products.index')->with('success', trans('general.form.flash.created',['name' => $product->product_name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $product = Product::findOrFail($id);

            $params = [
                'title' => 'Delete Product',
                'product' => $product,
            ];

            return view('admin.products.products_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $brands = Brand::all();
            $categories = Category::all();
            $product = Product::findOrFail($id);

            $params = [
                'title' => 'Edit Product',
                'brands' => $brands,
                'categories' => $categories,
                'product' => $product,
            ];

            return view('admin.products.products_edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
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
        try
        {
            $this->validate($request, [
                'product_code' => 'required|unique:products,product_code,'.$id,
                'product_name' => 'required',
                'description' => 'required',
                'price' => 'required',
                'brand_id' => 'required',
                'category_id' => 'required',
            ]);

            $product = Product::findOrFail($id);

            $product->product_code = $request->input('product_code');
            $product->product_name = $request->input('product_name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->brand_id = $request->input('brand_id');
            $product->category_id = $request->input('category_id');

            $product->save();

            return redirect()->route('products.index')->with('success', trans('general.form.flash.updated',['name' => $product->product_name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $product = Product::find($id);

            $product->delete();

            return redirect()->route('products.index')->with('success', trans('general.form.flash.deleted',['name' => $product->product_name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
}