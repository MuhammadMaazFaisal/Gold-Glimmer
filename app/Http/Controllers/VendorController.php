<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function create()
    {
        $currentRoute = request()->route()->getName();
        if ($currentRoute == 'manufacturer') {
            $type = 'Manufacturing';
        } elseif ($currentRoute == 'polisher') {
            $type = 'Polishing';
        } elseif ($currentRoute == 'stone-setter') {
            $type = 'Stone Setting';
        } else {
            $type = 'Additional Vendors';
        }
        return view('admin.vendor.create', compact('type'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'status' => 'required',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->city = $request->city;
        $vendor->state = $request->state;
        $vendor->zip = $request->zip;
        $vendor->country = $request->country;
        $vendor->status = $request->status;
        $vendor->save();

        return redirect()->route('admin.vendor.index');
    }

    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('admin.vendor.edit', compact('vendor'));
    }
}
