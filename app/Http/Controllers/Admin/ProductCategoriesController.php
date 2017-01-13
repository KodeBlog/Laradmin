<?php

namespace Larashop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Larashop\Models\Category;
use Larashop\Http\Controllers\Controller;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        $params = [
            'title' => 'Categories Listing',
            'categories' => $categories,
        ];

        return view('admin.categories.categories_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create Product Category',
        ];

        return view('admin.categories.categories_create')->with($params);
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
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('product-categories.index')->with('success', "The product category <strong>$category->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        $params = [
            'title' => 'Edit Product Category',
            'category' => $category,
        ];

        return view('admin.categories.categories_delete')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        $params = [
            'title' => 'Edit Product Category',
            'category' => $category,
        ];

        return view('admin.categories.categories_edit')->with($params);
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
        $category = Category::find($id);

        if (!$category)
        {
            return redirect()
                ->route('product-categories.index')
                ->with('warning', 'The category you requested for has not been found.');
        }

        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
            'description' => 'required',
        ]);

        $category->name = $request->input('name');
        $category->description = $request->input('description');

        $category->save();

        return redirect()->route('product-categories.index')->with('success', "The product category <strong>Category</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category){
            return redirect()
                ->route('product-categories.index')
                ->with('warning', 'The category you requested for has not been found.');
        }

        $category->delete();

        return redirect()->route('product-categories.index')->with('success', "The product category <strong>Category</strong> has successfully been archived.");
    }
}
