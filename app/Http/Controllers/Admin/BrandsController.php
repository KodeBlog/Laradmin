<?php

namespace Larashop\Http\Controllers\Admin;

use Larashop\Models\Brand;
use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;

class BrandsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
      {
        $brands = Brand::all();

        $params = [
            'title' => 'Brands Listing',
            'brands' => $brands,
        ];

        return view('admin.brands.brands_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create Brand',
        ];

        return view('admin.brands.brands_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = Brand::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('brands.index')->with('success', "The brand <strong>$brand->name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);

        $params = [
            'title' => 'Delete Brand',
            'brand' => $brand,
        ];

        return view('admin.brands.brands_delete')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        $params = [
            'title' => 'Edit Brand',
            'brand' => $brand,
        ];

        return view('admin.brands.brands_edit')->with($params);
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
        $brand = Brand::find($id);

        if (!$brand){
            return redirect()
                ->route('brands.index')
                ->with('warning', 'The brand you requested for has not been found.');
        }

        $brand->description = $request->input('description');

        $brand->save();

        return redirect()->route('brands.index')->with('success', "The brand <strong>$brand->name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);

        if (!$brand){
            return redirect()
                ->route('brands.index')
                ->with('warning', 'The brand you requested for has not been found.');
        }

        $brand->delete();

        return redirect()->route('brands.index')->with('success', "The brand <strong>Brand</strong> has successfully been archived.");
    }
}
