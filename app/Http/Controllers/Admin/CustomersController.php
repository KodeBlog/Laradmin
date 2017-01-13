<?php

namespace Larashop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Larashop\Models\Customer;
use Larashop\Http\Controllers\Controller;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        $params = [
            'title' => 'Customers Listing',
            'customers' => $customers,
        ];

        return view('admin.customers.customers_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Create Customer',
        ];

        return view('admin.customers.customers_create')->with($params);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:customers',
            'postal_address' => 'required',
            'physical_address' => 'required',
        ]);

        $customer = Customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'postal_address' => $request->input('postal_address'),
            'physical_address' => $request->input('physical_address'),
        ]);

        return redirect()->route('customers.index')->with('success', "The customer <strong>$customer->first_name</strong> has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        $params = [
            'title' => 'Delete Customer',
            'customer' => $customer,
        ];

        return view('admin.customers.customers_delete')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        $params = [
            'title' => 'Edit Customer',
            'customer' => $customer,
        ];

        return view('admin.customers.customers_edit')->with($params);
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
        $customer = Customer::find($id);

        if (!$customer){
            return redirect()
                ->route('customers.index')
                ->with('warning', 'The customer you requested for has not been found.');
        }

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$id,
            'postal_address' => 'required',
            'physical_address' => 'required',
        ]);

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->physical_address = $request->input('physical_address');
        $customer->postal_address = $request->input('postal_address');

        $customer->save();

        return redirect()->route('customers.index')->with('success', "The customer <strong>$customer->first_name</strong> has successfully been updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer){
            return redirect()
                ->route('customers.index')
                ->with('warning', 'The customer you requested for has not been found.');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', "The customer <strong>$customer->first_name</strong> has successfully been archived.");
    }
}