<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json($customers);
    }

    public function create()
    {
        return view('admin.customer.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();
        $customer->id = $request->id;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->balance = $request->balance;
        $customer->save();

        $notification = array(
            'message' => 'Customer created successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json(['customer' => $customer]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $notification = array(
            'message' => 'Customer updated successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        $notification = array(
            'message' => 'Customer deleted successfully!',
            'alert-type' => 'success'
        );

        return response()->json(['data' => $notification]);
    }

    public function getNextCustomerNumber()
    {
        $customer = Customer::latest()->first();
        $number = $customer ? intval($customer->id) + 1 : 1;
        return response()->json(['customerNumber' => $number]);
    }


}
